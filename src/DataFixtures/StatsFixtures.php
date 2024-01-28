<?php

namespace App\DataFixtures;

use App\Entity\Stats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatsFixtures extends Fixture
{
    private const OBJECT_REFERENCE = 'Stats';
    public function load(ObjectManager $manager): void
    {
        $array = [
            "Hâte",
            "Critique",
            "Vitesse",
            "Expertise"
        ];
 
        foreach ($array as $key => $value) {
            $object = new Stats();
            $object->setName($value);
            $manager->persist($object);
            $this->addReference(self::OBJECT_REFERENCE . '_' . $key, $object);
        }

        $manager->flush();
    }
}
