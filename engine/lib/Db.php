<?php

namespace engine\lib;

use PDO;

class Db
{
    private $db;

    public function __construct()
    {
        $conf = require 'engine/configs/dbconf.php';
        $this->db = new PDO('mysql:host='. $conf['dbhost'] .';dbname='. $conf['dbname'] . ';charset=utf8', $conf['dbuser'], $conf['dbpassword']);
    }

    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function stmt($sql){
        return $this->db->prepare($sql);
    }

    public function row($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}