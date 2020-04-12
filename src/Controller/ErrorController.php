<?php

namespace Controller;

use Core\Controller;

class ErrorController extends Controller
{
    public function error404Action()
    {
        $this->render('404');
    }
}
