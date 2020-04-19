<?php


namespace Model;

use Core\Entity;

class MovieModel extends Entity
{
    public $id_film;
    public $id_genre;
    public $id_distrib;
    public $titre;
    public $resum;
    public $date_debut_affiche;
    public $date_fin_affiche;
    public $duree_min;
    public $annee_prod;
    protected $primary_key = 'id_film';
    protected $table = 'film';

    public function save(): string
    {
        $request = $this->pdo->prepare("INSERT INTO $this->table 
            (id_genre,id_distrib, titre, resum, date_debut_affiche, date_fin_affiche, duree_min, annee_prod) VALUES 
            (:id_genre, :id_distrib, :titre, :resum, :date_debut_affiche, :date_fin_affiche, :duree_min, :annee_prod)");

        $date_debut_affiche= date("Y-m-d", strtotime($this->date_debut_affiche));
        $date_fin_affiche = date("Y-m-d", strtotime($this->date_fin_affiche));

        $request->bindParam(':id_genre', $this->id_genre);
        $request->bindParam(':id_distrib', $this->id_distrib);
        $request->bindParam(':titre', $this->titre);
        $request->bindParam(':resum', $this->resum);
        $request->bindParam(':date_debut_affiche', $date_debut_affiche);
        $request->bindParam(':date_fin_affiche', $date_fin_affiche);
        $request->bindParam(':duree_min', $this->duree_min);
        $request->bindParam(":annee_prod", $this->annee_prod);

        $request->execute();

        return $this->pdo->lastInsertId();
    }

    public function update()
    {
        $request = $this->pdo->prepare(
            "update $this->table set
                 id_genre = :id_genre,
                 id_distrib = :id_distrib, 
                 titre = :titre, 
                 resum = :resum,
                 date_debut_affiche = :date_debut_affiche,
                 date_fin_affiche = :date_fin_affiche,
                 duree_min = :duree_min, 
                 annee_prod = :annee_prod
                where id_film = :id_film"
        );

        $date_debut_affiche= date("Y-m-d", strtotime($this->date_debut_affiche));
        $date_fin_affiche = date("Y-m-d", strtotime($this->date_fin_affiche));

        $request->bindParam(':id_genre', $this->id_genre);
        $request->bindParam(':id_distrib', $this->id_distrib);
        $request->bindParam(':titre', $this->titre);
        $request->bindParam(':resum', $this->resum);
        $request->bindParam(':date_debut_affiche', $date_debut_affiche);
        $request->bindParam(':date_fin_affiche', $date_fin_affiche);
        $request->bindParam(':duree_min', $this->duree_min);
        $request->bindParam(":annee_prod", $this->annee_prod);
        $request->bindParam(":id_film", $this->id_film);
        $request->execute();
    }


    public function gender_by_movie($id)
    {
        $request = $this->pdo->prepare("select * from film inner join genre 
                                                            on film.id_genre = genre.id_genre
                                                            where film.id_film = :id");
        $request->execute([
            'id' => $id
        ]);

        return $request->fetch();
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

    public function delete($id)
    {
        $request = $this -> pdo->prepare('delete from film where id_film = :id');
        $request->execute([
            'id' => $id
        ]);
    }
}
