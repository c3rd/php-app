<?php

use Infra\Database\MysqlPDOConnection;

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

