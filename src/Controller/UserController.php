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

        $email = $this->request->http_post_request('email');
        $password = $this->request->http_post_request('password');

        $user_add = new UserModel($email, $password);
        $user_add->save();
    }
}