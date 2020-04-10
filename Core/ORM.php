<?php

namespace Core;

 use PDO;

 class ORM extends Database
 {
     /**
      * @var PDO
      */
     private $pdo;

     public function __construct()
     {
         $this->pdo = static::databse_connexion();
     }

     public function create($table, $fields) : int
     {
         [$key_fields, $value_fields] = $this->organize_fields($fields);

         $request = $this->pdo->prepare("INSERT INTO $table ($key_fields) VALUES ($value_fields)");

         echo $request->queryString;
         $request->execute();
         return $this->pdo->lastInsertId();
     }

     public function read($table, $id) : array
     {
         $request = $this->pdo->prepare("select * from $table where id = :id");
         $request->bindParam(':id', $id);
         $request->execute();
         return $request->fetchAll(PDO::FETCH_ASSOC);
     }

     public function read_all($table) : array
     {
         $request = $this->pdo->query("select * from $table  ");
         return $request->fetchAll(PDO::FETCH_ASSOC);
     }

     public function update($table, $id, $fields) : bool
     {
         $wheres = $this->get_fields_update($fields);

         $request = $this->pdo->prepare("update $table set $wheres where id = :id");
         $request->bindParam(':id', $id);

         return $request->execute();
     }

     public function delete($table, $id) : bool
     {
         $request = $this->pdo->prepare("delete from $table where id = :id");
         $request->bindParam(':id', $id);
         return $request->execute();
     }

     public function find(
         $table,
         $params = [
            'WHERE' => '1',
            'ORDER BY' => 'id ASC',
            'LIMIT' => ''
        ]
     ) : array {
         [$id, $fields] = $this->fields_find($params);

         $request = $this->pdo->prepare("select * from $table $fields");
         $request->bindParam(':id', $id);

         $request->execute();

         return $request->fetchAll();
     }

     /**
      * @param $params
      * @return array
      */
     private function fields_find($params): array
     {
         $array_args_tmp = [];
         $id = '';

         foreach ($params as $key => $value) {
             if (empty($value)) {
                 unset($params[$key]);
             }

             if ($key === 'WHERE') {
                 $params[$key] = 'id = :id ';
                 $id = $value;
             }
         }

         foreach ($params as $key => $value) {
             $array_args_tmp[] = $key . ' ' . $value;
         }

         return [
             $id,
             implode('', $array_args_tmp)
         ];
     }

     /**
      * @param $fields
      * @return array
      */
     private function organize_fields($fields): array
     {
         $key_fields = implode(',', array_flip($fields));

         foreach ($fields as $key => $value) {
             $fields[$key] = '\'' . $value . '\'';
         }
         $value_fields = implode(',', $fields);
         return array($key_fields, $value_fields);
     }

     /**
      * @param $fields
      * @return string
      */
     private function get_fields_update($fields) : string
     {
         $wheres = [];

         foreach ($fields as $key => $val) {
             $wheres[] = $key . ' = ' . '\'' . $val . '\'';
         }

         return implode(',', $wheres);
     }
 }
