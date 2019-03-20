<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user
                ->setName($faker->name($gender = 'male'|'female' ))
                ->setStartAt($faker->dateTimeThisMonth($max = 'now', $timezone = null))
                ->setDuration($faker->randomDigitNotNull)
                ->setAdvanced($faker->randomDigitNotNull);
            $manager->persist($user);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
