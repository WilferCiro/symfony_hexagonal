<?php
namespace App\User\Infrastructure\sql\Entity;

use App\User\Domain\model\User;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "users")]
class UserEntity
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

    public function toDomain(): ?User
    {
        $user = new User($this->firstName, $this->lastName, $this->email, $this->password, $this->id);
        return $user;
    }

    public static function toDomainParams($user): ?User
    {
        $user = new User($user["firstName"], $user["lastName"], $user["email"], $user["password"], $user["id"]);
        return $user;
    }

    // Update
    public function update($user)
    {
        $this->firstName = $user->getFirstName() ?? $this->firstName;
        $this->lastName = $user->getLastName() ?? $this->lastName;
        $this->email = $user->getEmail() ?? $this->email;
    }

    // Setters
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
}