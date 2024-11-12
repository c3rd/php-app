<?php

namespace Infra\Controller;

use Infra\Repository\AuthRepository;

class AuthController {

    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function handleRequest()
    {
        $action = $_REQUEST['action'] ?? '';
        switch ($action) {
            case 'login':
                $this->authRepository->login($_POST['username'], $_POST['password']);
                break;
            case 'logout':
                $this->authRepository->logout();
                break;
            default:
                break;
        }
        header('Location: index.php');
    }
    
}