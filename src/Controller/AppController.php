<?php

namespace Controller;

use Core\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        $this->render('home');
    }
}
