<?php


namespace app\models;


use engine\core\Model;

class Account extends Model
{

    public function setVerified($token){
        $user = $this->getUserByToken($token);
        if($user){
            $this->db->query("UPDATE users SET verified = 1 WHERE token = :token", ['token' => $token]);
            return 'success';
        }else{
            return 'no_such_user_token';
        }
    }

    public function getUserByToken($token){
        return $this->db->row("SELECT * FROM users WHERE token = :token", ['token' => $token])[0];
    }

    public function verifyLogin($email, $password)
    {
        $user = $this->getUserByEmail($email)[0];
        if(!empty($user)){
            $hash = $this->jaxHash($password);
            if($hash == $user['password']){
                return 'success';
            }else{
                return 'wrong_pass';
            }
        }else{
            return 'no_such_user';
        }
    }

    public function signupValidate($email, $pass, $passCopy, $name, $surname, $access)
    {
        if (!$this->passwordsEqual($pass, $passCopy)) {
            return 'passwords_not_equal';
        } elseif (strlen($pass) > 30) {
            return 'long_password';
        } elseif (strlen($pass) <= 6) {
            return 'short_password';
        } elseif (strlen($name) > 50) {
            return 'long_name';
        } elseif (strlen($surname) > 50) {
            return 'long_surname';
        } elseif ($access == false) {
            return 'not_accesses';
        } elseif (count($this->getUserByEmail($email)) > 0) {
            return 'email_exists';
        }
        return 'success';
    }

    public function getUserByEmail($email)
    {
        return $this->db->row("SELECT * from users WHERE email = :email", [
            'email' => $email
        ]);
    }

    public function passwordsEqual($pass1, $pass2)
    {
        if ($pass1 = $pass2) {
            return true;
        }
        return false;
    }

    public function addUser($email, $pass, $name, $surname)
    {
        $token = $this->createToken();
        $hashedPassword = $this->jaxHash($pass);
        $to = $email;
        $subject = 'Регистрация';
        $message = 'Приветствуем Вас на нашем сайте!<br>';
        $message .= 'Пройдите по ссылке ниже, чтобы подтвердить регистрацию:<br><br>';
        $message .= 'http://' . $_SERVER['HTTP_HOST'] . '/access/' . $token;
        $headers = 'From: admin@microsoft-licence.kz' . "\r\n" .
            'Reply-To: admin@microsoft-licence.kz' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        $this->db->query('INSERT INTO `users` (`id`, `verified`, `email`, `password`, `username`, `surname`, `token`) 
                    VALUES (NULL, NULL, :email, :password, :username, :surname, :token)', [
            'email' => $email,
            'password' => $hashedPassword,
            'username' => $name,
            'surname' => $surname,
            'token' => $token,
        ]);
    }

    public function createToken()
    {
        $tk = bin2hex(random_bytes(41));
        if ($this->tokenExists($tk)) {
            $tk = $this->createToken();
        }
        return $tk;
    }

    public function tokenExists($token)
    {
        $request = $this->db->row('SELECT token FROM users WHERE token = :token', ['token' => $token]);
        if (count($request) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function jaxHash($password)
    {
        return md5($password . md5($password . "Jax") . "Adam");
    }
}