<?php


namespace Model;

use Core\Entity;

class TagModel extends Entity
{
    public static $relations = ['has many articles'];

    public function tag_by_article($pivot_table, $foreign_key_1, $foreign_key_2)
    {
        $request = $this->pdo->query("select * from articles inner join $pivot_table 
                                                            on articles.$foreign_key_1 = article_tags.$foreign_key_1
                                                            inner join tags 
                                                            on $pivot_table.$foreign_key_2 = tags.$foreign_key_2");
        return $request->fetchAll();
    }
}
