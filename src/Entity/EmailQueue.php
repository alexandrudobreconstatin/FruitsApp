<?php

namespace App\Entity;

use App\Repository\EmailQueueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmailQueueRepository::class)]
class EmailQueue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $emailFrom = null;

    #[ORM\Column(length: 255)]
    private ?string $emailTo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emailCC = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emailBcc = null;

    #[ORM\Column(length: 255)]
    private ?string $emailSubject = null;

    #[ORM\Column(length: 2500, nullable: true)]
    private ?string $emailContent = null;

    #[ORM\Column(nullable: true)]
    private ?int $emailHasAttach = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAdded = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateSent = null;

    #[ORM\Column]
    private ?int $userId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailFrom(): ?string
    {
        return $this->emailFrom;
    }

    public function setEmailFrom(string $emailFrom): self
    {
        $this->emailFrom = $emailFrom;

        return $this;
    }

    public function getEmailTo(): ?string
    {
        return $this->emailTo;
    }

    public function setEmailTo(string $emailTo): self
    {
        $this->emailTo = $emailTo;

        return $this;
    }

    public function getEmailCC(): ?string
    {
        return $this->emailCC;
    }

    public function setEmailCC(?string $emailCC): self
    {
        $this->emailCC = $emailCC;

        return $this;
    }

    public function getEmailBcc(): ?string
    {
        return $this->emailBcc;
    }

    public function setEmailBcc(?string $emailBcc): self
    {
        $this->emailBcc = $emailBcc;

        return $this;
    }

    public function getEmailSubject(): ?string
    {
        return $this->emailSubject;
    }

    public function setEmailSubject(string $emailSubject): self
    {
        $this->emailSubject = $emailSubject;

        return $this;
    }

    public function getEmailContent(): ?string
    {
        return $this->emailContent;
    }

    public function setEmailContent(?string $emailContent): self
    {
        $this->emailContent = $emailContent;

        return $this;
    }

    public function getEmailHasAttach(): ?int
    {
        return $this->emailHasAttach;
    }

    public function setEmailHasAttach(?int $emailHasAttach): self
    {
        $this->emailHasAttach = $emailHasAttach;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateAdded(): ?\DateTimeInterface
    {
        return $this->dateAdded;
    }

    public function setDateAdded(\DateTimeInterface $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    public function getDateSent(): ?\DateTimeInterface
    {
        return $this->dateSent;
    }

    public function setDateSent(\DateTimeInterface $dateSent): self
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
