<?php

namespace App\User\Infrastructure\Mapper;

use App\User\Domain\model\User;
use App\User\Infrastructure\Dto\UserCreateDto;
use App\User\Infrastructure\Dto\UserUpdateDto;


class UserMapper
{
    public static function toDomainCreate(UserCreateDto $user): ?User
    {
        return new User($user->firstName, $user->lastName, $user->email, $user->password);
    }
    public static function toDomainUpdate(UserUpdateDto $user): ?User
    {
        return new User($user->firstName, $user->lastName, $user->email);
    }
}