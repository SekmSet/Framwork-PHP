<?php


namespace Model;

use Core\Entity;

class SalleModel extends Entity
{
    protected $table = 'salle';

    public function get_salle()
    {
        $request = $this->pdo->query("select * from $this->table");
        return $request->fetchAll();
    }
}
