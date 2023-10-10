<?php

namespace App\Product\Application;

use App\Product\Domain\interfaces\ProductRepositoryInterface;
use App\Shared\Domain\Utils\PaginatorDomain;
use App\Product\Domain\interfaces\ProductServiceInterface;
use App\Product\Domain\model\Product;

class ProductService implements ProductServiceInterface
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getById(int $id): ?Product
    {
        return $this->productRepository->getById($id);
    }

    public function getPaginated(int $page, int $quantity): ?PaginatorDomain
    {
        return $this->productRepository->getPaginated($page, $quantity);
    }
    public function create(Product $product): ?Product
    {
        return $this->productRepository->create($product);
    }
    public function update(int $id, Product $product): ?Product
    {
        return $this->productRepository->update($id, $product);
    }
}