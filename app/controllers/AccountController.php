<?php


namespace app\controllers;


use engine\core\Controller;
use engine\core\View;

class AccountController extends Controller
{
    public $errors;

    public function loginAction(){
        if(!empty($_POST)){
            if(isset($_POST['email'])){
                $email = $_POST['email'];
            }
            if(isset($_POST['password'])){
                $password = $_POST['password'];
            }
            if($this->model->verifyLogin($email, $password) == 'success'){
                $_SESSION['status'] = 1;
                $_SESSION['id'] = $this->model->getUserByEmail($email)[0]['id'];
                $_SESSION['token'] = $this->model->getUserByEmail($email)[0]['token'];
                $this->view->location('/cabinet');
            }else{
                $errors = require 'engine/errors/error.php';
                $this->view->message(['message' => $errors[$this->model->verifyLogin($email, $password)]]);
            }
        }
        if($this->params['status'] > 0){
            View::errorCode(404);
        }else{
            $this->view->render();
        }
    }

    public function signupAction(){
        if(!empty($_POST)){
            if(isset($_POST['email'])){
                $email = $_POST['email'];
            }
            if(isset($_POST['password'])){
                $password = $_POST['password'];
            }
            if(isset($_POST['password2'])){
                $password2 = $_POST['password2'];
            }
            if(isset($_POST['name'])){
                $name = $_POST['name'];
            }
            if(isset($_POST['surname'])){
                $surname = $_POST['surname'];
            }
            if(isset($_POST['access'])){
                $access = true;
            }else{
                $access = false;
            }
            if($this->model->signupValidate($email, $password, $password2, $name, $surname, $access) == 'success'){
                $this->model->addUser($email, $password, $name, $surname);
                $_SESSION['status'] = 1;
                $_SESSION['id'] = $this->model->getUserByEmail($email)[0]['id'];
                $_SESSION['token'] = $this->model->getUserByEmail($email)[0]['token'];
                $this->view->location('/cabinet');
            }else{
                $errors = require 'engine/errors/error.php';
                $this->view->message(['message' => $errors[$this->model->signupValidate($email, $password, $password2, $name, $surname, $access)]]);
            }
        }
        if($this->params['status'] > 0){
            View::errorCode(404);
        }else{
            $this->view->render();
        }
    }

    public function logoutAction(){
        session_unset();
        $this->view->redirect('/');
    }

    public function accessAction(){
       if($this->model->setVerified($this->params['token']) == 'success'){
           $this->view->render();
       }else{
           View::errorCode(404);
       }

    }
}