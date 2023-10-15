<?php

namespace App\Shared\Infrastructure\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class PaginationQueryDto
{
    public function __construct(
    #[Assert\NotBlank(message: "Por favor envía limit")]
    #[Assert\LessThanOrEqual(100)]
        public readonly int $limit = 25,

    #[Assert\NotBlank(message: "Por favor envía la página")]
    #[Assert\LessThanOrEqual(10_000)]
        public readonly int $page = 1,
    ) {
    }
}