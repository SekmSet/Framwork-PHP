<?php


namespace Controller;

use Core\Controller;
use Model\PriceModel;

class PriceController extends Controller
{
    public function reductionAction()
    {
        $reduction = new PriceModel();
        $reductions = $reduction->get_reduction();
        $this->render('prices', [
            'reductions' => $reductions
        ]);
    }

    public function subscriptionAction()
    {
        $sub = new PriceModel();
        $subs = $sub->get_sub();


        $this->render('subscription', [
            'subs' => $subs
        ]);
    }
}
