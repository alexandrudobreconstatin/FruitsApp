<?php

namespace App\Entity;

use App\Repository\FruitsRepository;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FruitsRepository::class)]
class Fruits
{

  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $name = null;

  #[ORM\Column(nullable: true)]
  private ?int $fruitId = null;

  // ManyToOne  Family
  #[ORM\ManyToOne(targetEntity: Family::class)]
  #[ORM\JoinColumn(name: "family_id", referencedColumnName: "id")]
  private ?Family $family = null;

  // ManyToOne  Order
  #[ORM\ManyToOne(targetEntity: Orders::class)]
  #[ORM\JoinColumn(name: "order_id", referencedColumnName: "id")]
  private ?Orders $order = null;

  // ManyToOne  Genus
  #[ORM\ManyToOne(targetEntity: Genus::class)]
  #[ORM\JoinColumn(name: "genus_id", referencedColumnName: "id")]
  private ?Genus $genus = null;

  #[ORM\ManyToOne(targetEntity: Nutritions::class)]
  #[ORM\JoinColumn(name: "nutrition_id", referencedColumnName: "id")]
  private ?Nutritions $nutrition = null;


  /**
   * @return Nutritions|null
   */
  public function getNutrition(): ?Nutritions
  {
    return $this->nutrition;
  }

  /**
   * @param Nutritions|null $nutrition
   */
  public function setNutrition(?Nutritions $nutrition): void
  {
    $this->nutrition = $nutrition;
  }

  /**
   * @return Genus|null
   */
  public function getGenus(): ?Genus
  {
    return $this->genus;
  }

  /**
   * @param Genus|null $genus
   */
  public function setGenus(?Genus $genus): void
  {
    $this->genus = $genus;
  }

  /**
   * @return Orders|null
   */
  public function getOrder(): ?Orders
  {
    return $this->order;
  }

  /**
   * @param Orders|null $order
   */
  public function setOrder(?Orders $order): void
  {
    $this->order = $order;
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  /**
   * @return Family|null
   */
  public function getFamily(): ?Family
  {
    return $this->family;
  }

  /**
   * @param Family|null $family
   */
  public function setFamily(?Family $family): void
  {
    $this->family = $family;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  public function getFamilyId(): ?int
  {
    return $this->familyId;
  }

  public function setFamilyId(int $familyId): self
  {
    $this->familyId = $familyId;

    return $this;
  }

  public function getOrderId(): ?int
  {
    return $this->orderId;
  }

  public function setOrderId(int $orderId): self
  {
    $this->orderId = $orderId;

    return $this;
  }

  public function getGenusId(): ?int
  {
    return $this->genusId;
  }

  public function setGenusId(int $genusId): self
  {
    $this->genusId = $genusId;

    return $this;
  }

  /**
   * @return int|null
   */
  public function getFruitId(): ?int
  {
    return $this->fruitId;
  }

  /**
   * @param int|null $fruitId
   */
  public function setFruitId(?int $fruitId): void
  {
    $this->fruitId = $fruitId;
  }

  /**
   * @return Collection
   */
  public function getNutritions(): Collection
  {
    return $this->nutritions;
  }


}
