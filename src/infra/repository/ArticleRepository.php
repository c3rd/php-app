<?php

namespace Infra\Repository;

use Application\Repository\IArticleRepository;
use Domain\Article;
use Infra\Database\DatabaseConnection;
use PDO;

class ArticleRepository implements IArticleRepository {

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all()
    {
        $stmt = $this->pdo->query("SELECT * FROM articles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(Article $article)
    {
        $stmt = $this->pdo->prepare("INSERT INTO articles (title, description) VALUES (:title, :description)");
        return $stmt->execute(['title' => $article->getTitle(), 'description' => $article->getDescription()]);
    }

    public function find(int $id)
    {
        $stmt = $this->pdo->query("SELECT * FROM articles WHERE id = $id ORDER BY created_at DESC LIMIT 1");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Article $article)
    {
        $stmt = $this->pdo->prepare("UPDATE articles SET title = :title, description = :description WHERE id = :id");
        return $stmt->execute(['id' => $article->getId(), 'title' => $article->getTitle(), 'description' => $article->getDescription()]);
    }

    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

}