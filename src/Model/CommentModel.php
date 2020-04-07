<?php


namespace Model;

use Core\Entity;

class CommentModel extends Entity
{

    // 1 commantaire pour 1 article = one to one
    public static $relations = ['has one article'];

    public function article_comment($id)
    {
        $request = $this->pdo->prepare('select * from commentaires inner join articles
                                                on commentaires.article_id = articles.article_id
                                                where id = :id');
        $request->bindParam(':id', $id);
        $request->execute();
        $request->fetchAll();
    }
}
