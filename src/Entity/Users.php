<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;



#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users implements UserInterface
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $FirstName = null;

  #[ORM\Column(length: 255)]
  private ?string $LastName = null;

  #[ORM\Column(length: 255)]
  #[Assert\NotBlank(message: "Username is Mandatory.")]
  private ?string $username = null;

  #[ORM\Column(length: 255)]
  #[Assert\NotBlank(message: "Email is Mandatory.")]
  #[Assert\Email(message: "Email is not valid.")]
  private ?string $email = null;

  #[ORM\Column(nullable: true)]
  private ?int $active = null;

  #[ORM\Column]
  private ?int $notificationAlert = null;

  #[ORM\Column(length: 255)]
  private ?string $password = null;


  public function getId(): ?int
  {
    return $this->id;
  }

  public function getFirstName(): ?string
  {
    return $this->FirstName;
  }

  public function setFirstName(string $FirstName): self
  {
    $this->FirstName = $FirstName;

    return $this;
  }

  public function getLastName(): ?string
  {
    return $this->LastName;
  }

  public function setLastName(string $LastName): self
  {
    $this->LastName = $LastName;

    return $this;
  }

  public function getUsername(): ?string
  {
    return $this->username;
  }

  public function setUsername(string $username): self
  {
    $this->username = $username;

    return $this;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(string $email): self
  {
    $this->email = $email;

    return $this;
  }

  public function getActive(): ?int
  {
    return $this->active;
  }

  public function setActive(?int $active): self
  {
    $this->active = $active;

    return $this;
  }

  public function getNotificationAlert(): ?int
  {
    return $this->notificationAlert;
  }

  public function setNotificationAlert(int $notificationAlert): self
  {
    $this->notificationAlert = $notificationAlert;

    return $this;
  }

  public function getPassword(): ?string
  {
    return $this->password;
  }

  public function setPassword(string $password): self
  {
    $this->password = $password;

    return $this;
  }

  // ... restul proprietăților și metodelor existente

  public function getRoles(): array
  {
    // Înlocuiți 'ROLE_USER' cu rolurile specifice aplicației dvs.
    return ['ROLE_USER'];
  }

  public function getSalt(): ?string
  {
    // Nu este necesar să utilizați un salt dacă utilizați bcrypt sau argon2i / argon2id
    return null;
  }

  public function eraseCredentials(): void
  {
    // Metoda poate fi lăsată goală dacă nu aveți date sensibile de șters
  }
}
