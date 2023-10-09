<?php

namespace App\Shared\Infrastructure\Utils;

use App\Shared\Application\PaginatorApplication;
use Doctrine\ORM\Tools\Pagination\Paginator as OrmPaginator;

class PaginatorRepository
{
    private $total;

    private $lastPage;

    private $data;

    public function paginate($query, $class_alias, int $page = 1, int $quantity = 10): PaginatorRepository
    {
        $paginator = new OrmPaginator($query);
        $paginator
            ->getQuery()
            ->setFirstResult($quantity * ($page - 1))
            ->setMaxResults($quantity);

        $this->total = $paginator->count();
        $this->lastPage = (int) ceil($paginator->count() / $paginator->getQuery()->getMaxResults());
        $data =  $paginator->getQuery()->getArrayResult();
        
         $this->data = array();
        foreach($data as $dt) {
            array_push($this->data, $class_alias::toDomainParams($dt));
        }

        return $this;
    }

    public function toDomain()
    {
        $newPaginator = new PaginatorApplication($this->total, $this->lastPage, $this->data);
        return $newPaginator;
    }
}