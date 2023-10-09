<?php
namespace App\User\Infrastructure\Controller;

use App\User\Application\UserService;
use App\Shared\Infrastructure\DTO\PaginationQueryDto;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;

class UserController extends AbstractController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    #[Route('/users/{id}', name: 'user_by_id', methods: ['GET'])]
    public function getById(int $id): Response
    {
        try {
            $user = $this->userService->getById($id);
            return $this->json($user->toDto());
        } catch (\Throwable $th) {
            echo $th->getCode();
            return $this->json(["Error" => "Error"]);
        }
    }

    #[Route('/users', name: 'user_paginated', methods: ['GET'])]
    public function getPaginated(#[MapQueryString] ?PaginationQueryDto $query,): Response
    {
        $user = $this->userService->getPaginated(1, 20);
        return $this->json($user->toDto());
    }

    #[Route('/users', name: 'user_create', methods: ['POST'])]
    public function create(#[MapQueryString] ?PaginationQueryDto $query,): Response
    {
        $user = $this->userService->getPaginated(1, 20);
        return $this->json($user->toDto());
    }
}