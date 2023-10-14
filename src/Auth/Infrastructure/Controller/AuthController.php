<?php
namespace App\Auth\Infrastructure\Controller;

use App\Auth\Domain\interfaces\AuthServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    #[Route('/login', name: 'login', methods: ['GET'])]
    public function login(): Response
    {
        try {
            $auth = $this->authService->login("w", "w");
            return $this->json($auth->toDto());
        } catch (\Throwable $e) {
            throw new HttpException(401, "Falló el login");
        }
    }

}