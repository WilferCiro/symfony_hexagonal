<?php

namespace App\User\Infrastructure\sql;

use App\Shared\Domain\Utils\PaginatorDomain;
use App\Shared\Infrastructure\sql\BaseRepository;
use App\User\Infrastructure\sql\Entity\UserEntity;
use App\User\Domain\model\User;
use App\User\Domain\interfaces\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Shared\Infrastructure\Utils\PaginatorRepository;

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
            return $this->throwNotFoundException();
        }
        return $user->toDomain();
    }

    public function getByEmail(string $email): ?User
    {
        $user = $this->entityManager->getRepository(UserEntity::class)->findOneBy(["email" => $email]);
        if (!$user) {
            return $this->throwNotFoundException();
        }
        return $user->toDomain();
    }

    public function getPaginated(int $page, int $quantity): ?PaginatorDomain
    {
        $paginator = new PaginatorRepository();
        $query = $this->entityManager->getRepository(UserEntity::class)->createQueryBuilder('p')->getQuery();
        $paginator->paginate($query, UserEntity::class, $page, $quantity);
        return $paginator->toDomain();
    }
    public function create(User $user): ?User
    {
        $userBD = new UserEntity();
        $userBD->setFirstName($user->getFirstName());
        $userBD->setLastName($user->getLastName());
        $userBD->setEmail($user->getEmail());
        $userBD->setPassword($user->getPassword());
        $this->entityManager->persist($userBD);
        $this->entityManager->flush();
        return $userBD->toDomain();
    }
    public function update(int $id, User $user): ?User
    {
        $userDB = $this->entityManager->getRepository(UserEntity::class)->find($id);
        if (!$userDB) {
            return $this->throwNotFoundException();
        }
        $userDB->update($user);
        $this->entityManager->flush();
        return $userDB->toDomain();
    }
}