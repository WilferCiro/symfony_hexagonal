<?php

namespace App\Auth\Domain\interfaces;

use App\Auth\Domain\model\Auth;

interface AuthServiceInterface
{
    public function login(string $email, string $password): ?Auth;
}