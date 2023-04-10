<?php

namespace App\Entity;

use App\Repository\NutritionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NutritionsRepository::class)]
class Nutritions
{

  
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: '0', nullable: true)]
  private ?string $carbohydrates = null;

  #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: '0', nullable: true)]
  private ?string $protein = null;

  #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: '0', nullable: true)]
  private ?string $fat = null;

  #[ORM\Column(nullable: true)]
  private ?int $calories = null;

  #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: '0', nullable: true)]
  private ?string $sugar = null;

  #[ORM\Column(nullable: false)]
  private ?int $fruitId = null;





  public function getId(): ?int
  {
    return $this->id;
  }

  public function getCarbohydrates(): ?string
  {
    return $this->carbohydrates;
  }

  public function setCarbohydrates(?string $carbohydrates): self
  {
    $this->carbohydrates = $carbohydrates;

    return $this;
  }

  public function getProtein(): ?string
  {
    return $this->protein;
  }

  public function setProtein(?string $protein): self
  {
    $this->protein = $protein;

    return $this;
  }

  public function getFat(): ?string
  {
    return $this->fat;
  }

  public function setFat(?string $fat): self
  {
    $this->fat = $fat;

    return $this;
  }

  public function getCalories(): ?int
  {
    return $this->calories;
  }

  public function setCalories(?int $calories): self
  {
    $this->calories = $calories;

    return $this;
  }

  public function getSugar(): ?string
  {
    return $this->sugar;
  }

  public function setSugar(?string $sugar): self
  {
    $this->sugar = $sugar;

    return $this;
  }

  public function getFruitId(): ?int
  {
    return $this->fruitId;
  }

  public function setFruitId(?int $fruitId): self
  {
    $this->fruitId = $fruitId;

    return $this;
  }
}
