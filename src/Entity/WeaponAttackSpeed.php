<?php

namespace App\Entity;

use App\Repository\WeaponAttackSpeedRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponAttackSpeedRepository::class)]
class WeaponAttackSpeed
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $speed = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpeed(): ?float
    {
        return $this->speed;
    }

    public function setSpeed(float $speed): static
    {
        $this->speed = $speed;

        return $this;
    }
}
