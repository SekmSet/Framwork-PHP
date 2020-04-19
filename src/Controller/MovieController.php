<?php

namespace Controller;

use Core\Controller;
use Core\ORM;
use Model\MovieModel;
use Model\SalleModel;

class MovieController extends Controller
{
    public function movieAction()
    {
        $movies = new ORM();
        $all_movies = $movies->read_all('film');

        $this->render('movies', [
            'all_movies' => $all_movies
        ]);
    }

    public function movieGenderAction($id)
    {
        $errors = [];
        $movies_gender = new MovieModel();
        $info = $movies_gender->gender_by_movie($id);

        if ($info === false) {
            $errors[] = "Film invalide";
        }

        $this->render('movie_gender', [
            'info' => $info,
            'errors' => $errors
        ]);
    }

    public function programmeAction($name)
    {
        $name = urldecode($name);
        $seance = new MovieModel();
        $seances = $seance->movie_show($name);

        $this->render('movie_show', [
            'seances' => $seances
        ]);
    }

    public function salleAction()
    {
        $salle = new SalleModel();
        $all_salles = $salle->get_salle();

        $this->render('salle', [
            'all_salles' => $all_salles
        ]);
    }

    public function newMovieAction()
    {
        $this->user_is_log();
        $gender = new ORM();
        $all_genders = $gender->read_all('genre');

        $distrib = new ORM();
        $all_distribs = $distrib->read_all('distrib');

        $params = $this->request->getQueryParams();
        if (!empty($params)) {
            $movie = new MovieModel($params);
            $movie->save();
        }

        $this->render('new', [
            'all_genders'=>$all_genders,
            'all_distribs'=>$all_distribs
        ]);
    }
    public function deleteMovieAction($id)
    {
//        $this->user_is_log();
        $delete = new MovieModel();
        $delete->delete($id);
        header('location: ' . BASE_URI . '/movies');
        die;
    }

    public function changeMovieAction($id)
    {
//        $this->user_is_log();

        $movie = new MovieModel([
            'id_film' => $id
        ]);

        $gender = new ORM();
        $all_genders = $gender->read_all('genre');

        $distrib = new ORM();
        $all_distribs = $distrib->read_all('distrib');

        $params = $this->request->getQueryParams();

        if (!empty($params)) {
            $movie->id_genre = $params['id_genre'];
            $movie->id_distrib = $params['id_distrib'];
            $movie->titre = $params['titre'];
            $movie->resum = $params['resum'];
            $movie->date_debut_affiche = $params['date_debut_affiche'];
            $movie->date_fin_affiche = $params['date_fin_affiche'];
            $movie->duree_min = $params['duree_min'];
            $movie->annee_prod = $params['annee_prod'];
            $movie->update();
        }


        $this->render('change', [
            'all_genders'=>$all_genders,
            'all_distribs'=>$all_distribs,
            'movie'=>$movie
        ]);
    }
}
