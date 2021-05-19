<?php

namespace App\DataFixtures;

use App\Entity\Solution;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SolutionFixtures extends AbstractBaseFixtures
{
    const FIXTURES_AMOUNT = 50;

    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->faker = Factory::create ();
        $this->manager = $manager;

        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
            $solution = new Solution();

            $solution->setSubmittedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));

            $this->manager->persist ($solution);
        }

        $manager->flush ();
    }
}

