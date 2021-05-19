<?php

namespace App\DataFixtures;

use App\Entity\Grade;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class GradeFixtures extends Fixture
{
    protected Generator $faker;

    protected ObjectManager $manager;

    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create ();
        $this->manager = $manager;

        for ($i = 0; $i < 10; ++$i) {
            $grade = new Grade();

            $grade->setComment($this->faker->sentence);
            $grade->setFinalScore($this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1));
            $grade->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));
            $grade->setAutoScore(0);

            $this->manager->persist ($grade);
        }

        $manager->flush ();
    }
}

