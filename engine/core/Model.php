<?php


namespace engine\core;


use engine\lib\Db;

abstract class Model
{
    public $db;
    public function __construct(){
        $this->db = new Db;
    }
}