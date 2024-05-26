<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    CONST NUMBER_REGULAR_USER = 20;

    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        $regularUser = new User();
        $regularUser
            ->setEmail("testeur@mail.com")
            ->setFirstname($faker->firstName())
            ->setLastname($faker->lastName())
            ->setPassword($this->hasher->hashPassword($regularUser, 'test'));

        $manager->persist($regularUser);

        for($i=0;$i< AppFixtures::NUMBER_REGULAR_USER; $i++){

            $multipleUser = new User();
            $multipleUser
                ->setEmail($faker->email())
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setPassword($this->hasher->hashPassword($multipleUser, 'test'));
    
            $manager->persist($multipleUser);
        }

        $adminUser = new User();
        $adminUser
            ->setEmail('arnaud@gmail.com')
            ->setFirstname('Arnaud')
            ->setLastname('Colombe')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->hasher->hashPassword($adminUser, 'admin'));

        $manager->persist($adminUser);

        $manager->flush();
    }
}
