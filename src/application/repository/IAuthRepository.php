<?php

namespace Application\Repository;  // Ensure the correct namespace

interface IAuthRepository {
    public function login($username, $password);
    public function logout();
    public function isLoggedIn();
}