<?php
if (empty($_SESSION)) {
    session_start();
}
use Infra\Controller\AuthController;
use Infra\Repository\AuthRepository;

require_once './src/application/repository/IAuthRepository.php';
require_once './src/infra/controller/AuthController.php';
require_once './src/infra/repository/AuthRepository.php';

$authRepository = new AuthRepository();
$authController = new AuthController($authRepository);
$authController->handleRequest();