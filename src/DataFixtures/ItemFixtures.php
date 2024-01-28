<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture
{
    private const OBJECT_REFERENCE = 'Item';
    public function load(ObjectManager $manager): void
    {
        $array = [
        ];
 
        foreach ($array as $key => $value) {
            $object = new Item();
            $object->setName($value);
            $manager->persist($object);
            $this->addReference(self::OBJECT_REFERENCE . '_' . $key, $object);
        }

        $manager->flush();
    }
}
