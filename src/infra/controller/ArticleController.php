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
        if (isset($_POST['method'])) 
        {
            switch ($_POST['method']) {
                case 'create':
                    $article = new Article(null, $_POST['title'], $_POST['description']);
                    $this->articleRepository->create($article);
                    break;
                case 'update':
                    $this->articleRepository->update($_POST['id'], $_POST['title'], $_POST['description']);
                case 'delete':
                    $this->articleRepository->delete($_POST['id']);
                default:
                    break;
            }
        }
        elseif (isset($_GET))
        {
            return $this->articleRepository->all();
        }
    }

}