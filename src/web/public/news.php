<?php

use Infra\Database\MysqlPDOConnection;

try {
    ob_start();
    if (empty($_SESSION)) {
        session_start();
    }
    
    require_once '../../infra/database/DatabaseConnection.php';
    require_once '../../infra/database/MysqlPDOConnection.php';
    require_once '../../application/repository/IArticleRepository.php';
    require_once '../../infra/repository/ArticleRepository.php';
    require_once '../../infra/controller/ArticleController.php';
    require_once '../../domain/Article.php';
    
    $articleRepository = new \Infra\Repository\ArticleRepository(MysqlPDOConnection::getInstance());
    $articleController = new \Infra\Controller\ArticleController($articleRepository);
    $articleController->handleRequest();
    ob_end_flush();
} catch (Throwable $e) {
    ob_end_clean();
    $_SESSION['status'] = false;
    $_SESSION['message'] = 'An error occurred. Error Message: ' . $e->getMessage();
    header('Location: index.php');
}