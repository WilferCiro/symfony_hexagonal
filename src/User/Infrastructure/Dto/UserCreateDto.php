<?php declare(strict_types=1);

namespace App\User\Infrastructure\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class UserCreateDto
{
    public function __construct(
    #[Assert\NotBlank(message: "El email no puede estar vacío")]
    #[Assert\Email(
        message: 'El email {{ value }} no es válido.',
    )]
        public readonly string $email,

    #[Assert\NotBlank(message: "La contraseña no puede estar vacía")]
        public readonly string $password,

    #[Assert\NotBlank(message: "El primer nombre no puede estar vacío")]
        public readonly string $firstName,

    #[Assert\NotBlank(message: "El apellido nombre no puede estar vacío")]
        public readonly string $lastName,

    ) {
    }
}