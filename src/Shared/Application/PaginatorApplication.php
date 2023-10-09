<?php
namespace App\Shared\Application;

use App\Shared\Domain\Utils\PaginatorDomain;

class PaginatorApplication implements PaginatorDomain
{
    private $total;
    private $lastPage;
    private $data;

    public function __construct($total, $lastPage, $data)
    {
        $this->total = $total;
        $this->lastPage = $lastPage;
        $this->data = $data;
    }

    public function toDto()
    {
        $data = array();
        foreach($this->data as $dt) {
            array_push($data, $dt->toDto());
        }
        return [
            "total" => $this->total,
            "lastPage" => $this->lastPage,
            "data" => $data,
        ];
    }
}