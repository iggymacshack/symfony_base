<?php

namespace App\Entity;

use App\Repository\RarityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RarityRepository::class)]
class Rarity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $statsWeight = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getStatsWeight(): ?int
    {
        return $this->statsWeight;
    }

    public function setStatsWeight(int $statsWeight): static
    {
        $this->statsWeight = $statsWeight;

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
