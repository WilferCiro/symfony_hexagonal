<?php
namespace App\Shared\Infrastructure\sql;

use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class BaseRepository
{
    protected function throwNotFoundException(string $message = "No existe el registro")
    {
        throw new HttpException(404, $message);
    }

    protected function throwBadRequestException(string $message = "Solicitud incorrecta")
    {
        throw new HttpException(400, $message);
    }

    protected function throwUnauthorizedException(string $message = "No autorizado")
    {
        throw new HttpException(401, $message);
    }

    protected function throwForbiddenException(string $message = "Acceso prohibido")
    {
        throw new HttpException(403, $message);
    }

    protected function throwInternalServerErrorException(string $message = "Error interno del servidor")
    {
        throw new HttpException(500, $message);
    }

    protected function throwServiceUnavailableException(string $message = "Servicio no disponible")
    {
        throw new HttpException(503, $message);
    }

    protected function throwCustomException(int $statusCode = 404, string $message = "No existe el registro")
    {
        throw new HttpException($statusCode, $message);
    }
}