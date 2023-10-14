<?php

namespace App\Auth\Application;

use App\Auth\Domain\interfaces\AuthRepositoryInterface;
use App\Auth\Domain\interfaces\AuthServiceInterface;
use App\Auth\Domain\model\Auth;
use App\User\Domain\interfaces\UserServiceInterface;

class AuthService implements AuthServiceInterface
{
    private $authRepository;
    private $userService;

    public function __construct(AuthRepositoryInterface $authRepository, UserServiceInterface $userService)
    {
        $this->userService = $userService;
        $this->authRepository = $authRepository;
    }
    public function login(string $email, string $password): ?Auth
    {
        $user = $this->userService->checkLogin($email, $password);
        if ($user) {
            return $this->authRepository->generateJWT($user);
        }
        return null;
    }

}