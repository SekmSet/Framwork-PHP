<?php


namespace Controller;

use Core\Controller;
use Core\ORM;
use Model\UserModel;

class PriceController extends Controller
{
    public function reductionAction()
    {
        $this->render('prices');
    }

    public function subscriptionAction()
    {
        $this->render('subscription');
    }
}
