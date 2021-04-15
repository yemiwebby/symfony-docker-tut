<?php

namespace App\DataFixtures;

use App\Entity\Quote;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class QuoteFixture extends Fixture {

    private $faker;

    public function __construct() {

        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager) {

        for ($i = 0; $i < 50; $i++) {
            $manager->persist($this->getQuote());
        }
        $manager->flush();
    }

    private function getQuote() {

        return new Quote(
            $this->faker->sentence(10),
            $this->faker->name(),
            $this->faker->year()
        );
    }
}