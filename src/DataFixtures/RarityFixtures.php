<?php

namespace App\DataFixtures;

use App\Entity\Rarity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RarityFixtures extends Fixture
{
    private const OBJECT_REFERENCE = 'Rarity';

    public function load(ObjectManager $manager): void
    {
        
        $array = [
            ['Commun',0],
            ['Rare',10],
            ['Epique',20],
            ['Légendaire',35]
        ];
 
        foreach ($array as $key => $value) {
            $object = new Rarity();
            $object->setName($value[0]);
            $object->setStatsWeight($value[1]);
            $manager->persist($object);
            $this->addReference(self::OBJECT_REFERENCE . '_' . $key, $object);
        }

        $manager->flush();
    }
}
