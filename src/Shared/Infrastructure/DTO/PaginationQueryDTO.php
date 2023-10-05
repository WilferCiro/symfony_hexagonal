<?php

namespace App\Shared\Infrastructure\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class PaginationQueryDto
{
    public function __construct(
        #[Assert\LessThanOrEqual(500)]
        public readonly int $limit = 25,

        #[Assert\LessThanOrEqual(10_000)]
        public readonly int $page = 0,
    ) {
    }
}