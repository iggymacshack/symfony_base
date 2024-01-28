<?php

namespace App\DataFixtures;

use App\Entity\ItemType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemTypeFixtures extends Fixture
{
    private const OBJECT_REFERENCE = 'ItemType';
    public function load(ObjectManager $manager): void
    {
        $array = [
            'Epee droite',
            'Sabre',
            'Katana',
            'Espadon',
            'Hache',
            "Hache d'armes",
            'Marteau',
            'Marteu de guerre',
            'Rapière',
        ];
 
        foreach ($array as $key => $value) {
            $object = new ItemType();
            $object->setName($value);
            $manager->persist($object);
            $this->addReference(self::OBJECT_REFERENCE . '_' . $key, $object);
        }

        $manager->flush();
    }
}
