<?php

namespace Model;

 use Core\Entity;

 class UserModel extends Entity
 {
     public $id_perso;
     public $email;
     public $mdp;
     public $nom;
     protected $primary_key = 'id_perso';

//     static $relations = [];

     public function save(): array
     {
         $request = $this->pdo->prepare('INSERT INTO fiche_personne (email, mdp) VALUES (:email, :mdp)');
         $request->bindParam(':email', $this->email);
         $request->bindParam(':mdp', $this->mdp);
         $request->execute();

         return [
            'email' => $this->email,
            'password' => $this->mdp
        ];
     }

     public function login(): bool
     {
         $request = $this->pdo->prepare('select * from fiche_personne where email = :email and mdp = :mdp');
         $request->bindParam(':email', $this->email);
         $request->bindParam(':mdp', $this->mdp);
         $request->execute();

         $user = $request->fetch();
         if ($user) {
             $this->id_perso = $user['id_perso'];
             $this->email = $user['email'];
             $this->mdp = $user['mdp'];
             $this->nom = $user['nom'];
             return true;
         }

         return false;
     }
     public function read_all(): array
     {
         $request = $this->pdo->prepare('select * from fiche_personne');
         $request->fetchAll();

         return [
            'email'=>$this->email,
            'password'=>$this->mdp
        ];
     }

     public function update(): array
     {
         $request = $this->pdo->prepare('update fiche_personne set email = :email, mdp = :mdp where id_perso = :id_perso');
         $request->bindParam(':email', $this->email);
         $request->bindParam(':mdp', $this->mdp);
         $request->bindParam(':id_perso', $this->id_perso);
         $request->execute();

         return [
            'email'=>$this->email,
            'password'=>$this->mdp
        ];
     }

     public function delete(): array
     {
         $request = $this->pdo->prepare('delete from fiche_personne where id_perso = :id_perso');
         $request->bindParam(':id_perso', $this->id_perso);
         $request->execute();

         return [
            'email'=>$this->email,
            'password'=>$this->mdp
        ];
     }
 }
