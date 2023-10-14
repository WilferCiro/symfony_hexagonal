<?php

namespace App\Product\Infrastructure\sql;

use App\Shared\Domain\Utils\PaginatorDomain;
use App\Shared\Infrastructure\sql\BaseRepository;
use App\Product\Infrastructure\sql\Entity\ProductEntity;
use App\Product\Domain\model\Product;
use App\Product\Domain\interfaces\ProductRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Shared\Infrastructure\Utils\PaginatorRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    private $entityManager;
    private $productMapper;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function getById(int $id): ?Product
    {
        $product = $this->entityManager->getRepository(ProductEntity::class)->find($id);
        if (!$product) {
            $this->throwNotFoundException();
        }
        return $product->toDomain();
    }

    public function getPaginated(int $page, int $quantity): ?PaginatorDomain
    {
        $paginator = new PaginatorRepository();
        $query = $this->entityManager->getRepository(ProductEntity::class)->createQueryBuilder('p')->getQuery();
        $paginator->paginate($query, ProductEntity::class, $page, $quantity);
        return $paginator->toDomain();
    }
    public function create(Product $product): ?Product
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush();
        return $product;
    }
    public function update(int $id, Product $product): ?Product
    {
        $existent = $this->getById($id);
        $existent->update($product);
        $this->entityManager->flush();
        return $product;
    }
}