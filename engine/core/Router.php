<?php

namespace engine\core;

use engine\lib\Db;

class Router
{
    protected $routes;
    protected $params;
    protected $db;

    public function __construct()
    {
        $this->db = new Db();
        $myRoutes = require 'engine/configs/routes.php';
        foreach ($myRoutes as $myRoute => $myParam){
            $this->add($myRoute, [
                'controller' => $myParam['controller'],
                'action' => $myParam['action'],
            ]);
        }
    }

    public function add($route, $params = []){
        $route = preg_replace('/{([a-z\-]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^'. $route .'$#';
        $this->routes[$route] = $params;
    }

    public function match(){
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params){
            if(preg_match($route, $url, $matches)){
                foreach ($matches as $k => $v){
                    if(!is_numeric($k)){
                        $params[$k] = $v;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run(){
        if($this->match()){
            if(!empty($_SESSION)){
                $this->loadSessions();
            }
            $class = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if(class_exists($class)){
                $action = $this->params['action'] . "Action";
                if(method_exists($class, $action)){
                    $controller = new $class($this->params);
                    $controller->$action();
                }else{
                    View::errorCode(404);
                }
            }else{
                View::errorCode(404);
            }
        }else{
            View::errorCode(404);
        }
    }

    public function loadSessions(){
        foreach ($_SESSION as $k => $v){
            $this->params[$k] = $v;
        }
    }
}