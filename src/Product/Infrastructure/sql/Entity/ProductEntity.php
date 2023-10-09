<?php
namespace App\Product\Infrastructure\sql\Entity;
use App\Product\Domain\model\Product;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "products")]
class ProductEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;
    
    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    public function toDomain():?Product {
        $product = new Product($this->id, $this->firstName, $this->lastName, $this->email, $this->password);
        return $product;
    }

    public static function toDomainParams($product):?Product {
        $product = new Product($product["id"], $product["firstName"], $product["lastName"], $product["email"], $product["password"]);
        return $product;
    }
}
