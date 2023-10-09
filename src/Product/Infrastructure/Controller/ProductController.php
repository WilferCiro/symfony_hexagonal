<?php
namespace App\Product\Infrastructure\Controller;

use App\Product\Application\ProductService;
use App\Shared\Infrastructure\DTO\PaginationQueryDto;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;

class ProductController extends AbstractController
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    
    #[Route('/products/{id}', name: 'product_by_id', methods: ['GET'])]
    public function getById(int $id): Response
    {
        try {
            $product = $this->productService->getById($id);
            return $this->json($product->toDto());
        } catch (\Throwable $th) {
            echo $th->getCode();
            return $this->json(["Error" => "Error"]);
        }
    }

    #[Route('/products', name: 'product_paginated', methods: ['GET'])]
    public function getPaginated(#[MapQueryString] ?PaginationQueryDto $query,): Response
    {
        $product = $this->productService->getPaginated(1, 20);
        return $this->json($product->toDto());
    }

    #[Route('/products', name: 'product_create', methods: ['POST'])]
    public function create(#[MapQueryString] ?PaginationQueryDto $query,): Response
    {
        $product = $this->productService->getPaginated(1, 20);
        return $this->json($product->toDto());
    }
}