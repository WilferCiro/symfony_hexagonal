<?php

namespace App\User\Domain\interfaces;

use App\User\Domain\Model\User;

interface UserRepositoryInterface
{
    public function getById(int $id): ?User;
    public function getPaginated(string $username): ?User;
}