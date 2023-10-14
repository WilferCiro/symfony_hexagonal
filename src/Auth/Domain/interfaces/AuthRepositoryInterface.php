<?php

namespace App\Auth\Domain\interfaces;

use App\Auth\Domain\Model\Auth;
use App\User\Domain\model\User;

interface AuthRepositoryInterface
{
    public function generateJWT(User $user): ?Auth;
}