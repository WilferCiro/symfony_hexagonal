<?php

namespace App\Auth\Infrastructure\Repository;

use App\Shared\Infrastructure\sql\BaseRepository;
use App\Auth\Domain\model\Auth;
use App\Auth\Domain\interfaces\AuthRepositoryInterface;
use App\User\Domain\model\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{

    private $entityManager;
    private $authMapper;
    private $jwtEncoder;

    public function __construct(EntityManagerInterface $entityManager, JWTEncoderInterface $jwtEncoder)
    {
        $this->entityManager = $entityManager;
        $this->jwtEncoder = $jwtEncoder;
    }
    public function generateJWT(User $user): ?Auth
    {
        $token = $this->jwtEncoder->encode([
            'id' => $user->getId(),
            'exp' => time() + 3600,
            // 1 hour expiration
        ]);
        $retData = new Auth($token);
        return $retData;
    }

}