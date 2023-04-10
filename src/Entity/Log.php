<?php

namespace App\Entity;

use App\Repository\LogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogRepository::class)]
class Log
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $date = null;

  #[ORM\Column]
  private ?int $NoFruitsInsert = null;

  #[ORM\Column]
  private ?int $noFruitsUpdated = null;

  #[ORM\Column]
  private ?int $notificationMailSent = null;

  #[ORM\Column]
  private ?int $status = null;

  #[ORM\Column(nullable: true)]
  private ?int $noFamilyInsert = null;

  #[ORM\Column(nullable: true)]
  private ?int $noFamilyUpdated = null;

  #[ORM\Column(nullable: true)]
  private ?int $noGenusInsert = null;

  #[ORM\Column(nullable: true)]
  private ?int $noGenusUpdated = null;

  #[ORM\Column(nullable: true)]
  private ?int $noOrderInsert = null;

  #[ORM\Column(nullable: true)]
  private ?int $noOrderUpdated = null;

  #[ORM\Column(nullable: true)]
  private ?int $noNutritionInsert = null;

  #[ORM\Column(nullable: true)]
  private ?int $noNutritionUpdate = null;

  #[ORM\Column(length: 2000, nullable: true)]
  private ?string $errorMessage = null;

  /**
   * @return int|null
   */
  public function getStatus(): ?int
  {
    return $this->status;
  }

  /**
   * @param int|null $status
   */
  public function setStatus(?int $status): void
  {
    $this->status = $status;
  }

  /**
   * @return int|null
   */
  public function getNotificationMailSent(): ?int
  {
    return $this->notificationMailSent;
  }

  /**
   * @param int|null $notificationMailSent
   */
  public function setNotificationMailSent(?int $notificationMailSent): void
  {
    $this->notificationMailSent = $notificationMailSent;
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getDate(): ?\DateTimeInterface
  {
    return $this->date;
  }

  public function setDate(\DateTimeInterface $date): self
  {
    $this->date = $date;

    return $this;
  }

  public function getNoFruitsInsert(): ?int
  {
    return $this->NoFruitsInsert;
  }

  public function setNoFruitsInsert(int $NoFruitsInsert): self
  {
    $this->NoFruitsInsert = $NoFruitsInsert;

    return $this;
  }

  public function getNoFruitsUpdated(): ?int
  {
    return $this->noFruitsUpdated;
  }

  public function setNoFruitsUpdated(int $noFruitsUpdated): self
  {
    $this->noFruitsUpdated = $noFruitsUpdated;

    return $this;
  }

  public function getNoFamilyInsert(): ?int
  {
      return $this->noFamilyInsert;
  }

  public function setNoFamilyInsert(?int $noFamilyInsert): self
  {
      $this->noFamilyInsert = $noFamilyInsert;

      return $this;
  }

  public function getNoFamilyUpdated(): ?int
  {
      return $this->noFamilyUpdated;
  }

  public function setNoFamilyUpdated(?int $noFamilyUpdated): self
  {
      $this->noFamilyUpdated = $noFamilyUpdated;

      return $this;
  }

  public function getNoGenusInsert(): ?int
  {
      return $this->noGenusInsert;
  }

  public function setNoGenusInsert(?int $noGenusInsert): self
  {
      $this->noGenusInsert = $noGenusInsert;

      return $this;
  }

  public function getNoGenusUpdated(): ?int
  {
      return $this->noGenusUpdated;
  }

  public function setNoGenusUpdated(?int $noGenusUpdated): self
  {
      $this->noGenusUpdated = $noGenusUpdated;

      return $this;
  }

  public function getNoOrderInsert(): ?int
  {
      return $this->noOrderInsert;
  }

  public function setNoOrderInsert(?int $noOrderInsert): self
  {
      $this->noOrderInsert = $noOrderInsert;

      return $this;
  }

  public function getNoOrderUpdated(): ?int
  {
      return $this->noOrderUpdated;
  }

  public function setNoOrderUpdated(?int $noOrderUpdated): self
  {
      $this->noOrderUpdated = $noOrderUpdated;

      return $this;
  }

  public function getNoNutritionInsert(): ?int
  {
      return $this->noNutritionInsert;
  }

  public function setNoNutritionInsert(?int $noNutritionInsert): self
  {
      $this->noNutritionInsert = $noNutritionInsert;

      return $this;
  }

  public function getNoNutritionUpdate(): ?int
  {
      return $this->noNutritionUpdate;
  }

  public function setNoNutritionUpdate(?int $noNutritionUpdate): self
  {
      $this->noNutritionUpdate = $noNutritionUpdate;

      return $this;
  }

  public function getErrorMessage(): ?string
  {
      return $this->errorMessage;
  }

  public function setErrorMessage(?string $errorMessage): self
  {
      $this->errorMessage = $errorMessage;

      return $this;
  }
}
