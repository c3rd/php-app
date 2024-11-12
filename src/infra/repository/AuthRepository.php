<?php

namespace Infra\Repository;

use Application\Repository\IAuthRepository;  // Ensure the correct namespace

class AuthRepository implements IAuthRepository {

    public function login($username, $password)
    {
        if ($username === 'admin' && $password === 'test') {
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }

    public function logout()
    {
        session_destroy();
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['username']);
    }

}