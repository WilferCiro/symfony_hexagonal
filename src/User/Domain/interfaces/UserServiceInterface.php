<?php

namespace App\User\Domain\interfaces;

use App\User\Domain\model\User;

interface UserServiceInterface
{
    public function getById(int $id): ?User;
}