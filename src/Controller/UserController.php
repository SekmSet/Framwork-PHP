<?php

namespace Controller;


use Core\Controller;
use Model\UserModel;

class UserController extends Controller
{
    public function addAction(){
        $this->render('register');
    }

    public function registerAction(){
        echo "registerAction";
//        $this->render('register');
        $foo = new UserModel($_POST['email'], $_POST['password']);

        $foo->save();
    }
}