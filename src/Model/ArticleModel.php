<?php


namespace Model;

use Core\Entity;

class ArticleModel extends Entity
{
    public static $relations = [
        'has many comments',
        'has many tags'
    ];

    // Plusieurs commantaire pour 1 artcile = Many to one || One to many
    protected $table = 'articles';

    public function get_all_comments($article_id): array
    {
        $request = $this->pdo->prepare("select * from commentaires inner join articles
                                                on commentaires.article_id = articles.article_id
                                                where article_id = :article_id");
        $request->bindParam(':article_id', $article_id);
        $request->execute();
        return $request->fetchAll();
    }
}
