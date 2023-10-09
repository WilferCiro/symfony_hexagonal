<?php

namespace App\Product\Domain\interfaces;

use App\Shared\Domain\Utils\PaginatorDomain;
use App\Product\Domain\Model\Product;

interface ProductRepositoryInterface
{
    public function getById(int $id): ?Product;
    public function getPaginated(int $page, int $quantity): ?PaginatorDomain;
    public function create(Product $product): ?Product;
    public function update(int $id, Product $product): ?Product;
}