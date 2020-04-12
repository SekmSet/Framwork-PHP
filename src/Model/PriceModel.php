<?php


namespace Model;

use Core\Entity;

class PriceModel extends Entity
{
    public function get_reduction()
    {
        $request = $this->pdo->query("select * from reduction");
        return $request->fetchAll();
    }

    public function get_sub()
    {
        $request = $this->pdo->query("select * from abonnement");
        return $request->fetchAll();
    }
}
