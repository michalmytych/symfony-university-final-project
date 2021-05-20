<?php

namespace App\DataFixtures;

use App\Entity\Problem;
use Doctrine\Persistence\ObjectManager;

class ProblemFixtures extends AbstractBaseFixtures
{
    const FIXTURES_AMOUNT = 50;

    /**
     * Loads data fixtures into database.
     * 
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
            $problem = new Problem();

            $problem->setTitle($this->faker->sentence);
            $problem->setDescription($this->faker->text);
            $problem->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));
            $problem->setTests([
                [
                    'input' => $this->faker->randomNumber(),
                    'output' => $this->faker->randomNumber()
                ],
                [
                    'input' => $this->faker->randomNumber(),
                    'output' => $this->faker->randomNumber()
                ],
                [
                    'input' => $this->faker->randomNumber(),
                    'output' => $this->faker->randomNumber()
                ],
            ]);

            $this->manager->persist($problem);
        }

        $manager->flush ();
    }
}

