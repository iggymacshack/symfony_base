<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\ItemType;
use App\Entity\Rarity;
use App\Entity\WeaponAttackSpeed;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ItemFixtures extends Fixture
{
    private const OBJECT_REFERENCE = 'Item';
    public function load(ObjectManager $manager): void
    {
        $array = [
            ["Excalibur (réplique)",4,100,"Sabre de belle facture",null,100,9,11,8],
            ["Hurlenfer",10,2000,"Hache d'arme légendaire",null,250,7,15,6],
            ["Katana pourpe",4,500,"Une arme honorable couleur sang",null,150,8,12,8],
            ["Espadon sumérien",4,100,"Arme légendaire d'un guerrier sumérien",null,100,8,13,8],
            ["Hache",4,100,null,null,100,9,14,8],
            ["Mjolnir",4,100,"Marteau légendaire du Dieu Thor",null,100,7,16,8],
            ["Marteau de guerre en acier",4,100,null,null,100,10,17,8],
            ["Plastron",4,100,null,100,null,8,19,8],
            ["Casque",4,100,null,150,null,7,21,8],
            ["Jambière",4,100,null,75,null,10,20,8],
            ["Gants",4,100,null,50,null,10,22,8],
        ];
 
        foreach ($array as $key => $value) {
            $object = new Item();
            $object->setName($value[0]);
            $object->setWeight($value[1]);
            $object->setSellPrice($value[2]);
            $object->setFlavorText($value[3]);
            $object->setArmorRating($value[4]);
            $object->setAttackRating($value[5]);
            $object->setRarity($value[6]);
            $object->setItemType($value[7]);
            $object->setAttackSpeed($value[8]);
            $manager->persist($object);
            $this->addReference(self::OBJECT_REFERENCE . '_' . $key, $object);
        }

        $manager->flush();
    }
}
