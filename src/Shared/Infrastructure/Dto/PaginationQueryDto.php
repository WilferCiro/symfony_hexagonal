<?php

namespace App\Shared\Infrastructure\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class PaginationQueryDto
{
    public function __construct(
        #[Assert\LessThanOrEqual(100)]
        public readonly int $limit = 25,

        #[Assert\LessThanOrEqual(10_000)]
        public readonly int $page = 0,
    ) {
    }
}