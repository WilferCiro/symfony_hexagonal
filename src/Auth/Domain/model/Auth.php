<?php

namespace App\Auth\Domain\model;

class Auth
{
    private $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function toDto()
    {
        return [
            "token" => $this->token,
        ];
    }
}