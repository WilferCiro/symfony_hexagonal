<?php

namespace App\User\Domain\model;

class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;

    public function __construct($firstName, $lastName, $email, $password = null, $id = null)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    public function checkPassword(string $password)
    {
        return $this->password == $password;
    }

    public function getId()
    {
        return $this->id;
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

    // Getters
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
}