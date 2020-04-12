<?php
namespace Controller;

use Core\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        $this->render('home');
    }

    public function notFoundAction()
    {
        echo "Page 404 \n ";
    }
}
