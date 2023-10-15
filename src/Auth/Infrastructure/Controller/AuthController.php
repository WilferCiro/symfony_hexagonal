<?php
declare(strict_types=1);

namespace App\Auth\Infrastructure\Controller;

use App\Auth\Domain\interfaces\AuthServiceInterface;
use App\Auth\Infrastructure\Dto\LoginDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/auth")]
class AuthController extends AbstractController
{
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    #[Route('/login', name: 'login', methods: ['POST'])]
    public function login(#[MapRequestPayload] LoginDto $body): Response
    {
        try {
            $auth = $this->authService->login($body->email, $body->password);
            return $this->json($auth->toDto());
        } catch (\Throwable $e) {
            throw new HttpException(401, "Falló el login");
        }
    }

}