<?php
if (empty($_SESSION)) {
    session_start();
}
use Infra\Controller\AuthController;
use Infra\Repository\AuthRepository;

require_once '../../application/repository/IAuthRepository.php';
require_once '../../infra/controller/AuthController.php';
require_once '../../infra/repository/AuthRepository.php';

$authRepository = new AuthRepository();
$authController = new AuthController($authRepository);
$authController->handleRequest();