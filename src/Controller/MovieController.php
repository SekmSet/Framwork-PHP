<?php

namespace Controller;

use Core\Controller;
use Core\ORM;
use Model\MovieModel;
use Model\SalleModel;
use Model\UserModel;

class MovieController extends Controller
{
    public function historyAction()
    {
        $user_id=$_SESSION['user_id'];
        $history = new MovieModel();
        $my_history = $history->historique($user_id);

        $this->render('history', [
            'my_history' => $my_history
        ]);
    }

    public function movieAction()
    {
        $movies = new ORM();
        $all_movies= $movies->read_all('film');

        $this->render('movies', [
            'all_movies' => $all_movies
        ]);
    }

    public function movieGenderAction($name)
    {
        $name = urldecode($name);
        $movies_gender = new MovieModel();
        $info = $movies_gender->gender_by_movie($name);

        $this->render('movie_gender', [
            'info' => $info
        ]);
    }

    public function programmeAction($name)
    {
        $name = urldecode($name);
        $seance = new MovieModel();
        $seances = $seance-> movie_show($name);

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
}
