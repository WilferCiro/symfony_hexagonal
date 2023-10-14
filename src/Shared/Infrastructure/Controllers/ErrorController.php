<?php

namespace App\Shared\Infrastructure\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpFoundation\Request;

class ErrorController
{
    public function error(Request $request)
    {
        // obtén el código de error (si está disponible)
        $statusCode = $request->attributes->get('exception') instanceof HttpExceptionInterface ? $request->attributes->get('exception')->getStatusCode() : 500;

        // obtén el mensaje de error
        $message = $request->attributes->get('exception') instanceof \Throwable ? $request->attributes->get('exception')->getMessage() : 'Ha ocurrido un error en la aplicación.';

        // crea una respuesta JSON con información detallada sobre el error
        $response = new JsonResponse([
            'error' => [
                'code' => $statusCode,
                'message' => $message
            ]
        ]);

        // establece el código de estado de la respuesta
        $response->setStatusCode($statusCode);

        return $response;
    }
}