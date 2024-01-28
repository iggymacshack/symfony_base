<?php

namespace App\DataFixtures;

use App\Entity\WeaponAttackSpeed;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WeaponAttackSpeedFixtures extends Fixture
{
    private const OBJECT_REFERENCE = 'WeaponAttackSpeed';
    public function load(ObjectManager $manager): void
    {
        $array = [
            1.00, 1.2,1.5,1.7,2.00
        ];
 
        foreach ($array as $key => $value) {
            $object = new WeaponAttackSpeed();
            $object->setSpeed($value);
            $manager->persist($object);
            $this->addReference(self::OBJECT_REFERENCE . '_' . $key, $object);
        }

        $manager->flush();
    }
}
