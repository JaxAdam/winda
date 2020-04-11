<?php

namespace app\controllers;

use engine\core\Controller;
use engine\core\View;

class MainController extends Controller
{
    public function homeAction(){
        $this->view->render();
    }
    public function oneAction(){
        $this->view->render();
    }
    public function twoAction(){
        $this->view->render();
    }
    public function threeAction(){
        $this->view->render();
    }
    public function fourAction(){
        $this->view->render();
    }
    public function fiveAction(){
        $this->view->render();
    }
    public function sixAction(){
        $this->view->render();
    }
    public function sevenAction(){
        $this->view->render();
    }
    public function eightAction(){
        $this->view->render();
    }
    public function nineAction(){
        $this->view->render();
    }
    public function tenAction(){
        $this->view->render();
    }
    public function gidAction(){
        $this->view->render();
    }
    public function cabinetAction(){
        if($this->params['status'] > 0){
            $user = $this->model->getUserByToken($this->params['token']);
            if($user['verified'] == NULL){
                $verified = 'Вы не подтвердили свой аккаунт. Пройдите по ссылке которую мы вам выслали на почту: ' . $user['email'];
            }else{
                $verified = 'Ваш аккаунт подтвержден';
            }
            $id = 'Ваш ID для приобретения лицензии: <span class="green">' . $user['id'] . '</span>';
            $licenses = $this->model->getUserLicenses($user['id']);
            $this->view->render([
                'verified' => $verified,
                'name' => ucfirst($user['username']) . ' ' . ucfirst($user['surname']),
                'id' => $id,
                'licenses' => $licenses
            ]);
        }else{
            View::errorCode(404);
        }

    }
}