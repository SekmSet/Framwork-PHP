<?php

namespace Controller;

use Core\Controller;
use Core\ORM;
use Model\UserModel;

class UserController extends Controller
{
    public function addAction()
    {
        $this->render('register');
    }

    public function loginAction()
    {
        $this->render('login');
    }

    public function registerAction()
    {
        echo 'registerAction';
//        $this->render('register');

//        $email = $this->request->getQueryParams();
//        $password = $this->request->getQueryParams();


//        $user_add = new UserModel($params);
//        $orm = new ORM();
//        $result = $orm->update('user', 107, [
//            'email' => 'tat@tt.tt',
//            'password' => 'azera'
//        ]);

        $params = $this->request->getQueryParams();
//        $params = ['id' => 15];
        $user = new UserModel($params);
        if (!$user->id) {
            $user->save() ;
            self::$_render = 'Votre compte a ete cree.' .PHP_EOL;
        }
    }

    public function show($id): void
    {
        echo " ID de l'utilisateur a afficher : $id " . PHP_EOL;
    }
}
