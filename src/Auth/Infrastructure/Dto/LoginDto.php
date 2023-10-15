<?php declare(strict_types=1);

namespace App\Auth\Infrastructure\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class LoginDto
{
    public function __construct(
    #[Assert\NotBlank(message: "El email no puede estar vacío")]
    #[Assert\Email(
        message: 'El email {{ value }} no es válido.',
    )]
        public readonly string $email,

    #[Assert\NotBlank(message: "La contraseña no puede estar vacía")]
        public readonly string $password,

    ) {
    }
}