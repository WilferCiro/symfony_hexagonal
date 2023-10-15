<?php 
namespace App\Shared\Infrastructure\Middleware;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class JwtMiddleware implements HttpKernelInterface
{
    private $app;

    public function __construct(HttpKernelInterface $app)
    {
        $this->app = $app;
    }

    public function handle(Request $request, int $type = self::MAIN_REQUEST, bool $catch = true): Response
    {
        // Lógica de preprocesamiento antes de pasar la solicitud al siguiente middleware
        // Puedes modificar la solicitud, realizar verificaciones de autenticación, etc.

        // Por ejemplo, verifica si hay un encabezado de autenticación en la solicitud
        $authorizationHeader = $request->headers->get('Authorization');
        if (empty($authorizationHeader)) {
            return new Response('No autorizado', 401);
        }

        // Si la autorización es válida, pasa la solicitud al siguiente middleware o controlador
        return $this->app->handle($request, $type, $catch);
    }
}