<?php


namespace Model;

use Core\Entity;

class HistoryModel extends Entity
{
    public $id_membre;
    public $id_film;
    public $date;
    public $avis;
    protected $primary_key = 'id';
    protected $table = 'historique_membre';

    public function save()
    {
        $request = $this->pdo->prepare("INSERT INTO $this->table (id_membre, id_film, date, avis ) 
                VALUES (:id_membre, :id_film, now(), :avis)");

        $request->execute([
            ':id_membre' => $this->id_membre,
            ':id_film' => $this->id_film,
            ':avis' => $this->avis
        ]);

        return $this->pdo->lastInsertId();
    }

    public function delete($id_film, $id_membre)
    {
        $request = $this -> pdo->prepare("delete from $this->table where id_film = :id_film and id_membre = :id_membre");
        $request->execute([
            'id_film' =>$id_film,
            'id_membre' => $id_membre
        ]);
    }

    public function historique($id_perso)
    {
        $request = $this->pdo->prepare("select * from fiche_personne
                inner join membre on fiche_personne.id_perso = membre.id_fiche_perso
                inner join historique_membre on membre.id_membre = historique_membre.id_membre
                inner join film on historique_membre.id_film = film.id_film
            where fiche_personne.id_perso = :id_perso");

        $request->execute([
            'id_perso' => $id_perso
        ]);

        return $request->fetchAll();
    }
}
