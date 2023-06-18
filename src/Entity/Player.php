<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $first_name = null;

    #[ORM\Column(length: 50)]
    private ?string $last_name = null;

    #[ORM\Column(options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $deleted_at = null;

    #[MaxDepth(1)]
    #[Groups("player")]
    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'players')]
    private ?Team $team = null;

    #[ORM\Column(options: ['default' => 'false'])]
    private ?bool $is_free_agent = null;

    #[ORM\Column(options: ['default' => 0.0])]
    private ?float $worth = null;

    #[ORM\OneToMany(mappedBy: 'player', targetEntity: PlayerTransfer::class)]
    private Collection $playerTransfers;

    public function __construct()
    {
        $this->playerTransfers = new ArrayCollection();
        $this->setIsFreeAgent(false);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function getName(): ?string
    {
        return '';
    }
    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;

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

    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(?\DateTimeImmutable $deleted_at): static
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): static
    {
        $this->team = $team;

        return $this;
    }

//    /**
//     * @return Collection<int, PlayerTransfer>
//     */
//    public function getPlayerTransfers(): Collection
//    {
//        return $this->playerTransfers;
//    }

    public function addPlayerTransfer(PlayerTransfer $playerTransfer): static
    {
        if (!$this->playerTransfers->contains($playerTransfer)) {
            $this->playerTransfers->add($playerTransfer);
            $playerTransfer->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerTransfer(PlayerTransfer $playerTransfer): static
    {
        if ($this->playerTransfers->removeElement($playerTransfer)) {
            // set the owning side to null (unless already changed)
            if ($playerTransfer->getPlayer() === $this) {
                $playerTransfer->setPlayer(null);
            }
        }

        return $this;
    }

    public function isIsFreeAgent(): ?bool
    {
        return $this->is_free_agent;
    }

    public function setIsFreeAgent(bool $is_free_agent): static
    {
        $this->is_free_agent = $is_free_agent;

        return $this;
    }

    public function getWorth(): ?float
    {
        return $this->worth;
    }

    public function setWorth(float $worth): static
    {
        $this->worth = $worth;

        return $this;
    }
}
