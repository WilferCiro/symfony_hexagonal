<?php
namespace App\User\Infrastructure\Controller;

use App\User\Infrastructure\Dto\UserCreateDto;
use App\Shared\Infrastructure\Dto\PaginationQueryDto;

use App\User\Domain\interfaces\UserServiceInterface;
use App\User\Infrastructure\Dto\UserUpdateDto;
use App\User\Infrastructure\Mapper\UserMapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
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
    public function getPaginated(#[MapQueryString] ?PaginationQueryDto $query, Request $request): Response
    {
        // dd($request->headers->get("Authorization"));
        $user = $this->userService->getPaginated($query->page ?? 1, $query->limit ?? 25);
        return $this->json($user->toDto());
    }

    #[Route('/', name: 'user_create', methods: ['POST'])]
    public function create(#[MapRequestPayload] UserCreateDto $body): Response
    {
        $bodyDomain = UserMapper::toDomainCreate($body);
        $user = $this->userService->create($bodyDomain);
        return $this->json($user->toDto());
    }

    #[Route('/{id}', name: 'user_update', methods: ['PATCH'])]
    public function update(int $id, #[MapRequestPayload] UserUpdateDto $body): Response
    {
        $bodyDomain = UserMapper::toDomainUpdate($body);
        $user = $this->userService->update($id, $bodyDomain);
        return $this->json($user->toDto());
    }
}