<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?float $weight = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $flavorText = null;

    #[ORM\Column(nullable: true)]
    private ?int $sellPrice = null;

    #[ORM\ManyToOne]
    private ?Rarity $rarity = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ItemType $itemType = null;

    #[ORM\ManyToOne]
    private ?WeaponAttackSpeed $attackSpeed = null;

    #[ORM\Column(nullable: true)]
    private ?int $armorRating = null;

    #[ORM\Column(nullable: true)]
    private ?int $attackRating = null;

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

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getFlavorText(): ?string
    {
        return $this->flavorText;
    }

    public function setFlavorText(?string $flavorText): static
    {
        $this->flavorText = $flavorText;

        return $this;
    }

    public function getSellPrice(): ?int
    {
        return $this->sellPrice;
    }

    public function setSellPrice(?int $sellPrice): static
    {
        $this->sellPrice = $sellPrice;

        return $this;
    }

    public function getRarity(): ?Rarity
    {
        return $this->rarity;
    }

    public function setRarity(?Rarity $rarity): static
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getItemType(): ?ItemType
    {
        return $this->itemType;
    }

    public function setItemType(?ItemType $itemType): static
    {
        $this->itemType = $itemType;

        return $this;
    }

    public function getAttackSpeed(): ?WeaponAttackSpeed
    {
        return $this->attackSpeed;
    }

    public function setAttackSpeed(?WeaponAttackSpeed $attackSpeed): static
    {
        $this->attackSpeed = $attackSpeed;

        return $this;
    }

    public function getArmorRating(): ?int
    {
        return $this->armorRating;
    }

    public function setArmorRating(?int $armorRating): static
    {
        $this->armorRating = $armorRating;

        return $this;
    }

    public function getAttackRating(): ?int
    {
        return $this->attackRating;
    }

    public function setAttackRating(?int $attackRating): static
    {
        $this->attackRating = $attackRating;

        return $this;
    }
}
