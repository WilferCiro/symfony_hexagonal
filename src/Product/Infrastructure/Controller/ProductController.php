<?php
namespace App\Product\Infrastructure\Controller;

use App\Product\Domain\interfaces\ProductServiceInterface;
use App\Shared\Infrastructure\Dto\PaginationQueryDto;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;

#[Route("/products")]
class ProductController extends AbstractController
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }
    
    #[Route('/{id}', name: 'product_by_id', methods: ['GET'])]
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

    #[Route('/', name: 'product_paginated', methods: ['GET'])]
    public function getPaginated(#[MapQueryString] ?PaginationQueryDto $query,): Response
    {
        $product = $this->productService->getPaginated(1, 20);
        return $this->json($product->toDto());
    }

    #[Route('/', name: 'product_create', methods: ['POST'])]
    public function create(#[MapQueryString] ?PaginationQueryDto $query,): Response
    {
        $product = $this->productService->getPaginated(1, 20);
        return $this->json($product->toDto());
    }
}