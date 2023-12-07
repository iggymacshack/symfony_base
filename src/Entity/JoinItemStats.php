<?php

namespace App\Entity;

use App\Repository\JoinItemStatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoinItemStatsRepository::class)]
class JoinItemStats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Item $itemId = null;

    #[ORM\ManyToOne]
    private ?Stats $statsId = null;

    #[ORM\Column]
    private ?int $value = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemId(): ?Item
    {
        return $this->itemId;
    }

    public function setItemId(Item $itemId): static
    {
        $this->itemId = $itemId;

        return $this;
    }

    public function getStatsId(): ?Stats
    {
        return $this->statsId;
    }

    public function setStatsId(Stats $statsId): static
    {
        $this->statsId = $statsId;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): static
    {
        $this->value = $value;

        return $this;
    }
}
