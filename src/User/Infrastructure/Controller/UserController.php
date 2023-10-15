<?php
namespace App\User\Infrastructure\Controller;

use App\Shared\Infrastructure\DTO\PaginationQueryDto;

use App\User\Domain\interfaces\UserServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;

#[Route("/users")]
class UserController extends AbstractController
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    #[Route('/{id}', name: 'user_by_id', methods: ['GET'])]
    public function getById(int $id): Response
    {
        $user = $this->userService->getById($id);
        return $this->json($user->toDto());
    }

    #[Route('/', name: 'user_paginated', methods: ['GET'])]
    public function getPaginated(#[MapQueryString] ?PaginationQueryDto $query, ): Response
    {
        $user = $this->userService->getPaginated(1, 20);
        return $this->json($user->toDto());
    }

    #[Route('/', name: 'user_create', methods: ['POST'])]
    public function create($body, ): Response
    {
        $user = $this->userService->create($body);
        return $this->json($user->toDto());
    }
}