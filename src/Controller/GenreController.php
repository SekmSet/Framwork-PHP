<?php


namespace Controller;


use Core\Controller;
use Model\GenreModel;
use Model\MovieModel;

class GenreController extends Controller
{

    public function listAction(){

        $genre = new GenreModel();
        $all_genre = $genre->read_all();

        $this->render('index',[
            'all_genre' => $all_genre
        ]);
    }

    public function createAction(){
        $this->user_is_log();
        $params = $this->request->getQueryParams();
        if (!empty($params)) {
            $genre = new GenreModel($params);
            $genre->save();
        }
    }

    public function changeAction($id){
        $this->user_is_log();

        $genre = new GenreModel([
            'id_genre' => $id
        ]);

        $params = $this->request->getQueryParams();
        if (!empty($params)) {
            $genre->nom = $params['nom'];
            $genre->update();

            header('location: ' . BASE_URI . '/genres');
            die;
        }

        $this->render('edit',[
            'result_genre' => $genre
        ]);
    }

    public function deleteAction($id_genre){
        $this->user_is_log();
        $genre = new GenreModel();
        $genre->delete($id_genre);
        header('location: ' . BASE_URI . '/genres');
        die;
    }
}