<?php


namespace app\models;


use engine\core\Model;

class Admin extends Model
{

    public function getUserLicenses($user){
        return $this->db->row("SELECT * FROM licenses WHERE owner = :user", ['user' => $user]);
    }

    public function unsetOwner($license){
        $this->db->query("UPDATE licenses SET owner = NULL WHERE id = :license", [
            'license' => $license,
        ]);
    }

    public function setOwner($license, $owner){
        if($this->getUserById($owner) == array()){
            return 'nu_such_user_id';
        }else {
            $this->db->query("UPDATE licenses SET owner = :owner WHERE id = :license", [
                'license' => $license,
                'owner' => $owner,
            ]);
            return 'success';
        }
    }

    public function getUserById($id){
        return $this->db->row("SELECT * FROM users WHERE id = :id",['id' => $id])[0];
    }

    public function deleteLicense($id){
        return $this->db->row("DELETE FROM licenses WHERE id = :id", ['id' => $id])[0];
    }

    public function getLicense($id){
        return $this->db->row("SELECT * FROM licenses WHERE id = :id", ['id' => $id])[0];
    }

    public function getLicenses(){
        return $this->db->row("SELECT * FROM licenses");
    }

    public function addLicense($name, $license_key, $count, $link){
        $this->db->query(
            "INSERT INTO `licenses` (`id`, `name`, `license_key`, `count`, `link`, `owner`) 
                VALUES (NULL, :name, :license_key, :count, :link, NULL);", [
                    'name' => $name,
                    'license_key' => $license_key,
                    'count' => $count,
                    'link' => $link,
            ]
        );
    }

    public function verifyLogin($login, $password)
    {
        $admin = $this->getAdminByLogin($login);
        if(!empty($admin)){
            $hash = $this->jaxHash($password);
            if($hash == $admin['password']){
                return 'success';
            }else{
                return 'wrong_pass';
            }
        }else{
            return 'no_such_user';
        }
    }

    public function getAdminByLogin($login){
        return $this->db->row('SELECT * FROM admins WHERE login = :login', ['login' => $login])[0];
    }

    public function jaxHash($password)
    {
        return md5($password . md5($password . "Jax") . "Adam");
    }

}