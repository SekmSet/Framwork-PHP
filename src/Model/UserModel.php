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
         $request = $this->pdo->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
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
         $request = $this->pdo->prepare('select * from users where id = :id');
         $request->bindParam(':email', $id);
         $request->fetch();

         return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
     }
     public function read_all(): array
     {
         $request = $this->pdo->prepare('select * from users');
         $request->fetchAll();

         return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
     }

     public function update(): array
     {
         $request = $this->pdo->prepare('update users set email = :email, password = :password where id = :id');
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
         $request = $this->pdo->prepare('delete from users where id = :id');
         $request->bindParam(':id', $this->id);
         $request->execute();

         return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
     }
 }
