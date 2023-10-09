<?php

namespace App\User\Domain\interfaces;

use App\Shared\Domain\Utils\PaginatorDomain;
use App\User\Domain\model\User;

interface UserServiceInterface
{
    public function getById(int $id): ?User;
    public function getPaginated(int $page, int $quantity): ?PaginatorDomain;
    public function create(User $user): ?User;
    public function update(int $id, User $user): ?User;
}