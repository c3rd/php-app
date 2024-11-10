<?php

namespace Infra\Repository;

use Domain\Article;
use Domain\IArticleRepository;
use PDO;

class ArticleRepository implements IArticleRepository {

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all()
    {
        $stmt = $this->pdo->query("SELECT * FROM articles ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(Article $article)
    {
        $stmt = $this->pdo->prepare("INSERT INTO articles (title, content) VALUES (:title, :content)");
        return $stmt->execute(['title' => $article->getTitle(), 'content' => $article->getDescription()]);
    }

    public function update(Article $article)
    {
        $stmt = $this->pdo->prepare("UPDATE articles SET title = :title, content = :content WHERE id = :id");
        return $stmt->execute(['id' => $article->getId(), 'title' => $article->getTitle(), 'content' => $article->getDescription()]);
    }

    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

}