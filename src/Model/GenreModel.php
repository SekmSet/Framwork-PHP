<?php


namespace Model;

use Core\Entity;
use PDO;

class GenreModel extends Entity
{
    public $id_genre;
    public $nom;
    protected $table = 'genre';
    protected $primary_key = 'id_genre';

    public function read($id_genre)
    {
        $request = $this->pdo->prepare("select * from $this->table 
            where id_genre = :id_genre");

        $request->execute([
            ':id_genre' => $id_genre
        ]);

        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $request = $this->pdo->prepare("INSERT INTO $this->table 
            (nom) VALUES 
            (:nom)");

        $request->bindParam(':nom', $this->nom);
        $request->execute();
        return $this->pdo->lastInsertId();
    }
    public function update()
    {
        $request = $this->pdo->prepare(
            "update $this->table set nom = :nom where id_genre = :id_genre"
        );
        $request->bindParam(':id_genre', $this->id_genre);
        $request->bindParam(':nom', $this->nom);
        $request->execute();
    }
    public function delete($id_genre)
    {
        $request = $this -> pdo->prepare("delete from $this->table where id_genre = :id_genre");
        $request->execute([
            'id_genre' => $id_genre
        ]);
    }
}
