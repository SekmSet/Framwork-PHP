<?php

namespace Controller;

use Core\Controller;
use Core\ORM;
use Model\MemberModel;
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

        $params = $this->request->getQueryParams();
        $user = new UserModel($params);

        if ($user->login()) {
            $_SESSION['user_id'] = $user->id_perso;
            $_SESSION['nom'] = $user->nom;
            header('location: '.BASE_URI.'/profil');
            die;
        }

        $errors[]='Aucun utilisateur trouvé, veuillez vérifier l\'adresse mail ou le mot de passe ! ';
        $this->render('login', [
            'errors' => $errors
        ]);
    }

    public function registerAction()
    {
        $errors=[];

        $params = $this->request->getQueryParams();
        $user = new UserModel($params);
        $id_user = $user->save();

        $membre = new MemberModel([
            'id_fiche_perso' => $id_user,
            'id_abo' => null,
            'date_abo' => null,
            'id_dernier_film' => null,
            'date_dernier_film' => null,
            'date_inscription' => (new \DateTime())->format("Y-m-d H:i:s")
        ]);
        $membre->save();

        if (empty($id_user)) {
            $errors[] = "Un problème est surevenu lors de votre enregistrment, merci de reéssayer plus tard";
            $this->render('register', [
                'errrors' =>$errors
            ]);
            return;
        }

        header('location: '.BASE_URI.'/login');
        die;
    }

    public function show_profilAction()
    {
        $this->user_is_log();
        $id_perso = $_SESSION['user_id'];

        $profil = new UserModel();
        $info = $profil->read($id_perso);

        $this->render('profil', [
            'info' => $info
        ]);
    }

    public function memberAction()
    {
        $profil = new ORM();
        $all_members = $profil->read_all('fiche_personne');

        $this->render('member', [
            'all_members' => $all_members
        ]);
    }

    public function logoutAction()
    {
        session_destroy();
        header('location: '.BASE_URI.'/');
        die;
    }

    public function changesAction()
    {
        $this->user_is_log();

        $params = $this->request->getQueryParams();
        $user = new UserModel([
            'id_perso' => $_SESSION['user_id']
        ]);

        $user->nom = $params['nom'];
        $user->prenom = $params['prenom'];
        $user->date_naissance = $params['date_naissance'];
        $user->email = $params['email'];
        $user->adresse = $params['adresse'];
        $user->cpostal = $params['cpostal'];
        $user->ville = $params['ville'];
        $user->pays = $params['pays'];
        $user->update();

        header('location: '.BASE_URI.'/profil');
        die;
    }

    public function deleteAction()
    {
        $this->user_is_log();

        $user = new UserModel([
            'id_perso' => $_SESSION['user_id']
        ]);
        $user->delete();

        session_destroy();
        header('location: '.BASE_URI.'/');
        die;
    }
}
