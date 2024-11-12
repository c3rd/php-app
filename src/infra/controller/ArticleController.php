<?php

namespace Infra\Controller;

use Domain\Article;
use Infra\Repository\ArticleRepository;

class ArticleController {

    private $articleRepository;
    
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (!empty($_POST['article_id']) && empty($_POST['action']))
            {
                $article = new Article($_POST['article_id'], $_POST['title'], $_POST['description']);
                $this->articleRepository->update($article);
                $message = 'News was changed sucessfully!';
            }
            elseif (!empty($_POST['article_id']) && $_POST['action'] == 'delete')
            {
                $this->articleRepository->delete($_POST['article_id']);
                $message = 'News was sucessfully deleted';
            }
            else
            {
                $article = new Article(null, $_POST['title'], $_POST['description']);
                $this->articleRepository->create($article);
                $message = 'News was successfully created!';
            }

            $_SESSION['status'] = true;
            $_SESSION['message'] = $message;
            header('Location: index.php');
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            return $this->articleRepository->all();
        }
    }

}