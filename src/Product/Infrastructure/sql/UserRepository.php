<?php

namespace App\User\Infrastructure\sql;

use App\Shared\Infrastructure\sql\BaseRepository;
use App\User\Infrastructure\sql\Entity\UserEntity;
use App\User\Domain\model\User;
use App\User\Domain\interfaces\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    private $entityManager;
    private $userMapper;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function getById(int $id): ?User
    {
        $user = $this->entityManager->getRepository(UserEntity::class)->find($id);
        if (!$user) {
            throw new EntityNotFoundException('No existe el usuario');
        }
        return $user->toDomain();
    }
    public function getPaginated(string $username): ?User
    {

    }
}