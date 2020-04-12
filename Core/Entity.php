<?php

namespace Core;

use PDO;

class Entity
{
    /**
     * @var array
     */
    protected $params;
    /**
     * @var PDO
     */
    protected $pdo;

    protected $primary_key = 'id';
    protected $table = '';



    /**
     * Entity constructor.
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->pdo = Database::databse_connexion();

        if (array_key_first($params) === $this->primary_key) {
            $id = $params[$this->primary_key];

            $orm = new ORM();
            $result = $orm->read($this->table, $id, $this->primary_key);

            $this->param_to_attribut($result[0]);
        }
        $this->param_to_attribut($params);
    }

    /**
     * @param array $params
     */
    private function param_to_attribut(array $params)
    {
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
    }
}
