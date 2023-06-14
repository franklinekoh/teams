<?php

namespace App\Entity;

use App\Repository\PlayerTransferRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Player;
use App\Entity\Team;

#[ORM\Entity(repositoryClass: PlayerTransferRepository::class)]
class PlayerTransfer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $currency = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToOne(inversedBy: 'playerTransfers')]
    private ?Player $player = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Team $buyer = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Team $seller = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrencyCode(): ?String
    {
        return $this->currency;
    }

    public function setCurrencyCode(String $currency): ?static
    {
        $this->currency = $currency;
        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

        return $this;
    }

    public function getBuyer(): ?Team
    {
        return $this->buyer;
    }

    public function setBuyer(?Team $buyer): static
    {
        $this->buyer = $buyer;

        return $this;
    }

    public function getSeller(): ?Team
    {
        return $this->seller;
    }

    public function setSeller(?Team $seller): static
    {
        $this->seller = $seller;

        return $this;
    }
}
