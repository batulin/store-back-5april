<?php

namespace App\DataFixtures;

use App\Entity\TypeOfPlace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeOfPlaceFixtures extends Fixture
{
    final public const STANDART_TYPE = 'standart';
    final public const GUEST_TYPE = 'guest';
    final public const PRESIDENT_TYPE = 'president';

    public function load(ObjectManager $manager): void
    {
        $types = [
            self::STANDART_TYPE => (new TypeOfPlace())
                ->setTypeName('Standart')
                ->setSlug('standart')
                ->setTypePrice(100),
            self::GUEST_TYPE => (new TypeOfPlace())
                ->setTypeName('Guest')
                ->setSlug('guest')
                ->setTypePrice(120),
            self::PRESIDENT_TYPE => (new TypeOfPlace())
                ->setTypeName('President')
                ->setSlug('president')
                ->setTypePrice(200),
        ];

        foreach ($types as $type) {
            $manager->persist($type);
        }

        $manager->flush();

        foreach ($types as $code => $type) {
            $this->addReference($code, $type);
        }
    }
}