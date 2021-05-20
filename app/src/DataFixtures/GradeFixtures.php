<?php

namespace App\DataFixtures;

use App\Entity\Grade;
use Doctrine\Persistence\ObjectManager;

class GradeFixtures extends AbstractBaseFixtures
{
    const FIXTURES_AMOUNT = 50;

    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
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

