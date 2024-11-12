<?php

use Infra\Database\MysqlPDOConnection;

if (empty($_SESSION)) {
    session_start();
}

require_once './src/infra/database/DatabaseConnection.php';
require_once './src/infra/database/MysqlPDOConnection.php';
require_once './src/application/repository/IArticleRepository.php';
require_once './src/infra/repository/ArticleRepository.php';
require_once './src/infra/controller/ArticleController.php';
require_once './src/domain/Article.php';

$articleRepository = new \Infra\Repository\ArticleRepository(MysqlPDOConnection::getInstance());
$articleController = new \Infra\Controller\ArticleController($articleRepository);
$articleController->handleRequest();

