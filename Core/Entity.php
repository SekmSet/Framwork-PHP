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

    /**
     * Entity constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->pdo = Database::databse_connexion();

        if (array_key_first($params) === 'id') {
            $id = $params['id'];
            $orm = new ORM();
            $result = $orm->read('users', $id);

            print_r($result);

            foreach ($result[0] as $key => $value){
                if($key === 'id'){
                    echo 'unset';
                    unset($result[0][$key]);
                }
            }
            print_r($result);
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
