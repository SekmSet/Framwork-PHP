<?php

namespace Model;

 use Core\Entity;

 class UserModel extends Entity
 {
     public $email;
     public $password;
     public $id;
//     static $relations = [];

     public function save(): array
     {
         $request = $this->pdo->prepare('INSERT INTO fiche_personne (email, password) VALUES (:email, :password)');
         $request->bindParam(':email', $this->email);
         $request->bindParam(':password', $this->password);
         $request->execute();

         return [
            'email' => $this->email,
            'password' => $this->password
        ];
     }

     public function read($id): array
     {
         $request = $this->pdo->prepare('select * from fiche_personne where id = :id');
         $request->bindParam(':email', $id);
         $request->fetch();

         return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
     }
     public function read_all(): array
     {
         $request = $this->pdo->prepare('select * from fiche_personne');
         $request->fetchAll();

         return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
     }

     public function update(): array
     {
         $request = $this->pdo->prepare('update fiche_personne set email = :email, password = :password where id = :id');
         $request->bindParam(':email', $this->email);
         $request->bindParam(':password', $this->password);
         $request->bindParam(':id', $this->id);
         $request->execute();

         return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
     }

     public function delete(): array
     {
         $request = $this->pdo->prepare('delete from fiche_personne where id = :id');
         $request->bindParam(':id', $this->id);
         $request->execute();

         return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
     }
 }
