<?php

namespace App\User\Application;

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

}