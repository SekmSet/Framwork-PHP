<?php

namespace Model;

use Core\Database;
use PDO;

class UserModel
{
    /**
     * @var PDO
     */
    private $pdo;

    private $email;
    private $password;
    private $id;


    /**
     * UserModel constructor.
     */
    public function __construct($email, $password)
    {
        $this->pdo = Database::databse_connexion();

        $this->email = $email;
        $this->password = $password;
    }

    public function save(){
    //        ajoute un enregistrement en BDD avec les attributs du model

//        $this->email = $email;
//        $this->password = $password;
        $request = $this->pdo->prepare('INSERT INTO user (email, password) VALUES (:email, :password)');
        $request->bindParam(':email', $this->email);
        $request->bindParam(':password', $this->password);
        $request->execute();

        return [
            'email'=> $this->email,
            'password'=> $this->password
        ];
    }

    public function read($id){
        //        ajoute un enregistrement en BDD avec les attributs du model

//        $this->email = $email;
//        $this->password = $password;
        $request = $this->pdo->prepare('select * from user where id = :id');
        $request->bindParam(':email', $id);
        $request->fetch();

        return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
    }
    public function read_all(){
        //        ajoute un enregistrement en BDD avec les attributs du model

//        $this->email = $email;
//        $this->password = $password;
        $request = $this->pdo->prepare('select * from user');
        $request->fetchAll();

        return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
    }

    public function update(){
        //        ajoute un enregistrement en BDD avec les attributs du model

//        $this->email = $email;
//        $this->password = $password;
        $request = $this->pdo->prepare('update user set email = :email, password = :password where id = :id');
        $request->bindParam(':email', $this->email);
        $request->bindParam(':password', $this->password);
        $request->bindParam(':id', $this->id);
        $request->execute();

        return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
    }

    public function delete(){
        //        ajoute un enregistrement en BDD avec les attributs du model

//        $this->email = $email;
//        $this->password = $password;
        $request = $this->pdo->prepare('delete from user where id = :id');
        $request->bindParam(':id', $this->id);
         $request->execute();

        return [
            'email'=>$this->email,
            'password'=>$this->password
        ];
    }
}