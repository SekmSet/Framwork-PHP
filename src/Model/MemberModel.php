<?php


namespace Model;

use Core\Entity;
use PDO;

class MemberModel extends Entity
{
    public $id_fiche_perso;
    public $id_abo;
    public $date_abo;
    public $id_dernier_film;
    public $date_dernier_film;
    public $date_inscription;
    protected $primary_key = 'id_membre';
    protected $table = 'membre';

    public function save()
    {
        $request = $this->pdo->prepare("INSERT INTO $this->table 
        (id_fiche_perso, id_abo, date_abo, id_dernier_film, date_dernier_film, date_inscription) VALUES 
        (:id_fiche_perso, :id_abo, :date_abo, :id_dernier_film, :date_dernier_film, :date_inscription)");

        $request->bindParam(':id_fiche_perso', $this->id_fiche_perso);
        $request->bindParam(':id_abo', $this->id_abo);
        $request->bindParam(':date_abo', $this->date_abo);
        $request->bindParam(':id_dernier_film', $this->id_dernier_film);
        $request->bindParam(':date_dernier_film', $this->date_dernier_film);
        $request->bindParam(":date_inscription", $this->date_inscription);

        $request->execute();

        return $this->pdo->lastInsertId();
    }

    public function get_membre($id_fiche_perso)
    {
        $request = $this->pdo->prepare("SELECT * FROM $this->table where id_fiche_perso = :id_fiche_perso");
        $request->execute([
            ':id_fiche_perso'=>$id_fiche_perso
        ]);

        return $request->fetch(PDO::FETCH_ASSOC);
    }
}
