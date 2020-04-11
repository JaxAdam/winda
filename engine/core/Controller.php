<?php

namespace engine\core;

abstract class Controller
{
    public $params;
    public $view;
    public $model;

    public function __construct($params)
    {
        $this->params = $params;
        $this->model = $this->loadModel($params['controller']);
        $this->view = new View($params);
    }

    public function loadModel($name)
    {
        $class = 'app\models\\' . ucfirst($name);
        if(class_exists($class)){
            return new $class;
        }
    }
}