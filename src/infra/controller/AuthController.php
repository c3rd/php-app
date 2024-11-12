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
                $this->login();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                break;
        }
        header('Location: index.php');
    }

    private function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $authenticated = $this->authRepository->login($username, $password);
        if (!$authenticated) {
            $_SESSION['message'] = 'Wrong Login Data!';
        }
    }

    private function logout()
    {
        $this->authRepository->logout();
    }

}