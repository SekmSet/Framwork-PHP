<?php


namespace Model;

use Core\Entity;

class MovieModel extends Entity
{
    protected $table = 'salle';

    public function gender_by_movie($name)
    {
        $request = $this->pdo->prepare("select * from film inner join genre 
                                                            on film.id_genre = genre.id_genre
                                                            where film.titre = :name");
        $request->execute([
            'name' => $name
        ]);

        return $request->fetch();
    }

    public function historique($id_membre)
    {
        $request = $this->pdo->prepare("select * from fiche_personne
                inner join membre on fiche_personne.id_perso = membre.id_membre
                inner join historique_membre on membre.id_membre = historique_membre.id_membre
                inner join film on historique_membre.id_film = film.id_film
            where historique_membre.id_membre = :id_membre");

        $request->execute([
            'id_membre' => $id_membre
        ]);

        return $request->fetchAll();
    }

    public function movie_show($name)
    {
        $request = $this->pdo->prepare("select * from salle 
            inner join grille_programme on salle.id_salle = grille_programme.id_salle
            inner join film  on grille_programme.id_film = film.id_film
            where salle.nom = :name");

        $request->execute([
            'name' => $name
        ]);
        return $request->fetchAll();
    }
}
