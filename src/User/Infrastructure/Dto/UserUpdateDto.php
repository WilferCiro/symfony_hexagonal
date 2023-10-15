<?php declare(strict_types=1);

namespace App\User\Infrastructure\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class UserUpdateDto
{
    public function __construct(
    #[Assert\Email(
        message: 'El email {{ value }} no es válido.',
    )]
        public readonly string $email,

        public readonly string $firstName,
        public readonly string $lastName,

    ) {
    }
}