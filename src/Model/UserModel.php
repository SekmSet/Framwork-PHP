<?php

namespace Model;

use Core\Entity;

class UserModel extends Entity
{
    public $id_perso;
    public $nom;
    public $prenom;
    public $date_naissance;
    public $email;
    public $adresse;
    public $cpostal;
    public $ville;
    public $pays;
    public $mdp;
    protected $primary_key = 'id_perso';
    protected $table = 'fiche_personne';


//     static $relations = [];

    public function save(): string
    {
        $request = $this->pdo->prepare("INSERT INTO $this->table 
            (nom, prenom, date_naissance, email, mdp, adresse, cpostal, ville, pays) VALUES 
            (:nom, :prenom, :date_naissance, :email, :mdp, :adresse, :cpostal, :ville, :pays)");

        $date_naissance = date("Y-m-d H:i:s", strtotime($this->date_naissance));

        $request->bindParam(':nom', $this->nom);
        $request->bindParam(':prenom', $this->prenom);
        $request->bindParam(':date_naissance', $date_naissance);
        $request->bindParam(':email', $this->email);
        $request->bindParam(':mdp', $this->mdp);
        $request->bindParam(":adresse", $this->adresse);
        $request->bindParam(':cpostal', $this->cpostal);
        $request->bindParam(':ville', $this->ville);
        $request->bindParam(':pays', $this->pays);

        $request->execute();

        return $this->pdo->lastInsertId();
    }

    public function login(): bool
    {
        $request = $this->pdo->prepare("select * from $this->table where email = :email and mdp = :mdp");
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

    public function read($id_perso)
    {
        $request = $this->pdo->prepare("select * from $this->table where id_perso = :id_perso");
        $request->bindParam(':id_perso', $id_perso);
        $request->execute();
        return $request->fetch();
    }

    public function read_all(): array
    {
        $request = $this->pdo->prepare("select * from $this->table");
        $request->fetchAll();

        return [
            'email' => $this->email,
            'password' => $this->mdp
        ];
    }

    public function update(): bool
    {
        $request = $this->pdo->prepare("update $this->table set nom = :nom, prenom = :prenom, 
                        date_naissance = :date_naissance, email = :email, adresse = :adresse, cpostal = :cpostal, 
                        ville = :ville, pays = :pays 
                        where id_perso = :id_perso");

        $date_naissance = date("Y-m-d H:i:s", strtotime($this->date_naissance));

        $request->bindParam(':nom', $this->nom);
        $request->bindParam(':prenom', $this->prenom);
        $request->bindParam(':date_naissance', $date_naissance);
        $request->bindParam(':email', $this->email);
        $request->bindParam(':adresse', $this->adresse);
        $request->bindParam(':cpostal', $this->cpostal);
        $request->bindParam(':ville', $this->ville);
        $request->bindParam(':pays', $this->pays);
        $request->bindParam(':id_perso', $this->id_perso);
        return $request->execute();
    }

    public function delete(): bool
    {
        $request = $this->pdo->prepare("delete from $this->table where id_perso = :id_perso");
        $request->bindParam(':id_perso', $this->id_perso);
        return $request->execute();
    }
}
