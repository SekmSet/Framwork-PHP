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

     public function article_all_comments($first_table, $second_table, $field_one, $field_two)
     {
         $request = $this->pdo->prepare("select * from $first_table inner join $second_table 
                                                            on $first_table.$field_one = $second_table.$field_two");
         $request->execute();
         return $request->fetchAll();
     }

     /**
      * Many to many - table pivot
      * @param $pivot_table
      * @param $foreign_key_1
      * @param $foreign_key_2
      * @return array
      */

     public function belongsToMany($pivot_table, $foreign_key_1, $foreign_key_2): array
     {
         $request = $this->pdo->query("select * from articles inner join $pivot_table 
                                                            on articles.$foreign_key_1 = $pivot_table.$foreign_key_1
                                                            inner join tags 
                                                            on $pivot_table.$foreign_key_2 = tags.$foreign_key_2");
         return $request->fetchAll();
     }

     /**
      * One to many
      * @param $table
      * @param $foreign_key
      * @return array
      */
     public function hasMany($table, $foreign_key): array
     {
         $request = $this->pdo->query("select * from commentaires inner join $table 
                                                            on commentaires.$foreign_key = $table.$foreign_key
                                                            ");
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
