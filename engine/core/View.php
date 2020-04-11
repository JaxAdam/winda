<?php

namespace engine\core;

class View
{
    public $path;
    public $params;
    public $layout = 'default';

    public function __construct($params)
    {
        $this->params = $params;
        $this->path = $params['controller'] . '/' . $params['action'];
    }

    public static function errorCode($code){
        http_response_code($code);
        $path = 'app/views/'. $code. '.php';
        if(file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/layouts/default.php';
        }
        exit;
    }

    public function render($data = []) {
        extract($data);
        $path = 'app/views/' . $this->path . '.php';
        if(file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/layouts/' . $this->layout. '.php';
        }else{
            View::errorCode(404);
        }
    }

    public function redirect($url){
        header('location: '.$url);
        exit;
    }

    public function redirectBack(){
        header('location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function location($url) {
        exit(json_encode(['url' => $url]));
    }

    public function locationBack() {
        exit(json_encode(['url' => $_SERVER['HTTP_REFERER']]));
    }

    public function message($message){
        exit(json_encode($message));
    }
}