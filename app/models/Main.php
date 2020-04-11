<?php


namespace app\models;


use engine\core\Model;

class Main extends Model
{

    public function getUserByToken($token){
        return $this->db->row("SELECT * FROM users WHERE token = :token", ['token' => $token])[0];
    }

    public function getUserLicenses($user){
        return $this->db->row("SELECT * FROM licenses WHERE owner = :user", ['user' => $user]);
    }

}