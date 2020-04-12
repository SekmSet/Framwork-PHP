<?php


namespace Model;

use Core\Entity;

class JobModel extends Entity
{
    protected $table = 'job';

    public function get_job()
    {
        $request = $this->pdo->query("select * from $this->table");
        return $request->fetchAll();
    }
}
