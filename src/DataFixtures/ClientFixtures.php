<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist((new Client())
            ->setFirstName('Юрий')
            ->setSecondName('Капанин')
            ->setPhone("676767")
            ->setStatus('active')
            ->setDescription('description'));

        $manager->persist((new Client())
            ->setFirstName('Олег')
            ->setSecondName('Ионин')
            ->setPhone("7678678")
            ->setStatus('active')
            ->setDescription('description'));

        $manager->persist((new Client())
            ->setFirstName('Азат')
            ->setSecondName('Хайдаров')
            ->setPhone("8788789798")
            ->setStatus('active')
            ->setDescription('description'));

        $manager->flush();
    }
}
