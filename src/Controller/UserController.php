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
            echo 'Votre compte a ete cree.' .PHP_EOL;
        }
    }

    public function showAction($id): void
    {
        $user1 = new \stdClass();
        $user1->id=1;
        $user1->name='bobo';

        $user2 = new \stdClass();
        $user2->id=2;
        $user2->name='bobi';

        $this->render('show', [
            'id' => (int)$id,
            'var' => '',
            'users' => [ $user1,$user2 ]
        ]);
    }

    public function show_profilAction()
    {
        $id=2;
        $profil = new ORM();
        $profil->read('fiche_personne', $id);
        $this->render('profil');
    }

    public function memberAction()
    {
        $profil = new ORM();
        $all_members = $profil->read_all('fiche_personne');

        $this->render('member', [
            'all_members' => $all_members
        ]);
    }
}
