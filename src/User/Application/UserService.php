<?php

namespace App\User\Application;

use App\Shared\Domain\Utils\PaginatorDomain;
use App\User\Domain\interfaces\UserServiceInterface;
use App\User\Infrastructure\sql\UserRepository;
use App\User\Domain\model\User;

class UserService implements UserServiceInterface
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getById(int $id): ?User
    {
        return $this->userRepository->getById($id);
    }

    public function getPaginated(int $page, int $quantity): ?PaginatorDomain
    {
        return $this->userRepository->getPaginated($page, $quantity);
    }
    public function create(User $user): ?User
    {
        return $this->userRepository->create($user);
    }
    public function update(int $id, User $user): ?User
    {
        return $this->userRepository->update($id, $user);
    }
}