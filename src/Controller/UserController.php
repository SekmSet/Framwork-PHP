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

    public function loginCheckAction()
    {
        $errors =[];
        $message =[];

        $params = $this->request->getQueryParams();
        $user = new UserModel($params);

        if ($user->login()) {
            $_SESSION['user_id'] = $user->id_perso;
            $_SESSION['nom'] = $user->nom;
            $message[]='Vous êtes connecté ' . $_SESSION['nom'];
            $this->render('profil', [
                'messages' => $message
            ]);
        } else {
            $errors[]='Aucun utilisateur trouvé, veuillez vérifier l\'adresse mail ou le mot de passe ! ';
            $this->render('login', [
                'errors' => $errors
            ]);
        }
    }

    public function registerAction()
    {
        $params = $this->request->getQueryParams();
//        $params = ['id' => 15];
        $user = new UserModel($params);
        if (!$user->id_perso) {
            $user->save() ;
            echo 'Votre compte a ete cree.' .PHP_EOL;
        }
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
