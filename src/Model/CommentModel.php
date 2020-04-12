<?php


namespace Model;

use Core\Entity;

class CommentModel extends Entity
{
    public static $relations = ['has one article'];

    // 1 commantaire pour 1 article = one to one
    protected $table = 'commentaires';

    public function article_comment($id)
    {
        $request = $this->pdo->prepare("select * from $this->table inner join articles
                                                on $this->table.article_id = articles.article_id
                                                where id = :id");
        $request->bindParam(':id', $id);
        $request->execute();
        $request->fetchAll();
    }
}
