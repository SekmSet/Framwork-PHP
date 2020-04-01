<?php
namespace Controller;

use Core\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        echo "add new controller :  AppController \n ";
    }

    public function notFoundAction()
    {
        echo "Page 404 \n ";
    }
}
