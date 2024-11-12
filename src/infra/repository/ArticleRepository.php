<?php

namespace Infra\Repository;

use Application\Repository\IArticleRepository;
use Domain\Article;
use Infra\Database\DatabaseConnection;

class ArticleRepository implements IArticleRepository {

    private $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public function all()
    {
        return $this->connection->query("SELECT * FROM articles", []);
    }

    public function create(Article $article)
    {
        return $this->connection->query("INSERT INTO articles (title, description) VALUES (:title, :description)", ['title' => $article->getTitle(), 'description' => $article->getDescription()]);
    }

    public function find(int $id)
    {
        return $this->connection->query("SELECT * FROM articles WHERE id = :id ORDER BY created_at DESC LIMIT 1", ['id' => $id]);
    }

    public function update(Article $article)
    {
        return $this->connection->query("UPDATE articles SET title = :title, description = :description WHERE id = :id", ['id' => $article->getId(), 'title' => $article->getTitle(), 'description' => $article->getDescription()]);
    }

    public function delete(int $id)
    {
        return $this->connection->query("DELETE FROM articles WHERE id = :id", ['id' => $id]);
    }

}