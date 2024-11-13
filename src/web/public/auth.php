<?php
use Infra\Controller\AuthController;
use Infra\Repository\AuthRepository;

try {
    ob_start();
    if (empty($_SESSION)) {
        session_start();
    }
    
    require_once '../../application/repository/IAuthRepository.php';
    require_once '../../infra/controller/AuthController.php';
    require_once '../../infra/repository/AuthRepository.php';
    
    $authRepository = new AuthRepository();
    $authController = new AuthController($authRepository);
    $authController->handleRequest();
    ob_end_flush();
} catch (Throwable $e) {
    ob_end_clean();
    $_SESSION['status'] = false;
    $_SESSION['message'] = 'An error occurred. Error Message: ' . $e->getMessage();
    header('Location: index.php');
}