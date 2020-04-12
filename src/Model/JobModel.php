<?php


namespace Model;

use Core\Entity;

class JobModel extends Entity
{
    public function get_job()
    {
        $request = $this->pdo->query('select * from job');
        return $request->fetchAll();
    }
}
