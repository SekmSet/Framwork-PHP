<?php


namespace Model;

use Core\Entity;

class SalleModel extends Entity
{
    public function get_salle()
    {
        $request = $this->pdo->query('select * from salle');
        return $request->fetchAll();
    }
}
