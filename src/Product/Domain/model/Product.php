<?php

namespace App\Product\Domain\model;

class Product
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;

    public function __construct($id, $firstName, $lastName, $email, $password)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    public function toDto()
    {
        return [
            "id" => $this->id,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "email" => $this->email,
        ];
    }

    // Other methods related to the Product entity, e.g., validation, business logic, etc.
    public function update($product) {
        $this->firstName = $product["firstName"];
    }
}