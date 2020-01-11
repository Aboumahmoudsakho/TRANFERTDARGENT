<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
namespace Symfony\Component\Security\Core\User;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 *  @ApiResource(
 *   collectionOperations={"get", "post"},
 *     itemOperations={"get"},
 * itemOperations={
 *  "put"={"method"="PUT",
 *  "path"="/users/caissier/{id}",
 * "security"="is_granted(['ROLE_SUPADMIN','ROLE_ADMIN'])",
 * "security_message"="Acces refuse. Seul Admin System et admin peuvent bloquer"
 * },
 * * "bloquer_admin"={"method"="PUT",
 * "path"="/users/admin/{id}",
 * "security"="is_granted(['ROLE_SUPADMIN'])",
 *  "security_message"="Acces refuse. Seul Admin System  peut bloquer"
 * },
 * )
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomcomplet;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isactif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="users")
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNomcomplet(): ?string
    {
        return $this->nomcomplet;
    }

    public function setNomcomplet(string $nomcomplet): self
    {
        $this->nomcomplet = $nomcomplet;

        return $this;
    }

    public function getIsactif(): ?bool
    {
        return $this->isactif;
    }

    public function setIsactif(bool $isactif): self
    {
        $this->isactif = $isactif;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }
    public function isAccountNonExpired()
    {
        return true;
    }
    public function isAccountNonLocked()
    {
        return true;
    }
    public function isCredentialsNonExpired()
    {
        return true;
    }
    public function isEnabled()
    {
        return $this->Isactif;
    }
}
