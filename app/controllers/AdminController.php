<?php


namespace app\controllers;


use engine\core\Controller;
use engine\core\View;

class AdminController extends Controller
{

    public function __construct($params)
    {
        parent::__construct($params);
        $this->view->layout = 'admin';
    }

    public function indexAction(){
        if(!empty($_POST)){
            if(isset($_POST['login'])){ $login = $_POST['login'];}
            if(isset($_POST['password'])){ $password = $_POST['password'];}
            if($this->model->verifyLogin($login, $password) == 'success'){
                $_SESSION['admin'] = 100;
                $this->view->location('/panel');
            }else{
                $errors = require 'engine/errors/error.php';
                $this->view->message(['message' => $errors[$this->model->verifyLogin($login, $password)]]);
            }
        }
        $this->view->layout = 'admin-login';
        if($this->params['admin'] > 50){
            View::errorCode(404);
        }else{
            $this->view->render();
        }
    }

    public function panelAction(){
        if($this->params['admin'] > 50){
            if(!empty($_POST)){
                if(isset($_POST['license'])){
                    $this->view->location('/panel/' . $_POST['license']);
                }
                if(isset($_POST['user'])){
                    $this->view->location('/panel/user/' . $_POST['user']);
                }
            }
            $licenses = $this->model->getLicenses();
            $this->view->render(['licenses' => $licenses]);
        }else{
            View::errorCode(404);
        }
    }

    public function licenseAction(){
        $license = $this->model->getLicense($this->params['license']);
        $this->view->render(['license' => $license]);
    }

    public function addAction(){
        if($this->params['admin'] > 50){
            if(!empty($_POST)){
                if(isset($_POST['name'])){ $name = $_POST['name'];}
                if(isset($_POST['license_key'])){ $license_key = $_POST['license_key'];}
                if(isset($_POST['count'])){ $count = $_POST['count'];}
                if(isset($_POST['link'])){ $link = $_POST['link'];}
                $this->model->addLicense($name, $license_key, $count, $link);
                $this->view->location('/panel');
            }
            $this->view->render();
        }else{
            View::errorCode(404);
        }
    }

    public function deleteAction(){
        if($this->params['admin'] > 50) {
            $id = $this->params['license'];
            $this->model->deleteLicense($id);
            $this->view->redirect('/panel');
        }else{
            View::errorCode(404);
        }
    }

    public function setownerAction(){
        if($this->params['admin'] > 50) {
            $id = $this->params['license'];
            if(!empty($_POST)){
                if(isset($_POST['id'])){ $user = $_POST['id'];}
                if($this->model->setOwner($id, $user) == 'success'){
                    $this->model->setOwner($id, $user);
                    $this->view->location('/panel');
                }else{
                    $errors = require 'engine/errors/error.php';
                    $this->view->message(['message' => $errors[$this->model->setOwner($id, $user)]]);
                }
            }
            $this->view->render(['id' => $id]);
        }else{
            View::errorCode(404);
        }
    }

    public function userAction(){
        if($this->params['admin'] > 50) {
            $id = $this->params['user'];
            $user = $this->model->getUserById($id);
            $licenses = $this->model->getUserLicenses($id);
            $this->view->render(['user' => $user, 'licenses' => $licenses]);
        }else{
            View::errorCode(404);
        }
    }

    public function unsetownerAction(){
        if($this->params['admin'] > 50) {
            $this->model->unsetOwner($this->params['license']);
            $this->view->redirect('/panel');
        }else{
            View::errorCode(404);
        }
    }

}