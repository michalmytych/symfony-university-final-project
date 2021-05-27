<?php

namespace App\DataFixtures;

use App\Entity\CodeLanguage;
use App\Entity\Solution;
use App\Entity\SolutionStatus;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SolutionFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    const FIXTURES_AMOUNT = 50;

    /**
     * Get all dependent fixtures classes to load them before.
     *
     * @return string[]
     */
    public function getDependencies(): array
    {
        return [
            CodeLanguageFixtures::class
        ];
    }

    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'codeLanguages', function($i) {
            // Create random CodeLanguage to fill solutions.code_language column
            $codeLanguage = new CodeLanguage();
            $codeLanguage->setJdoodleCode('random_code');
            $codeLanguage->setName('random_name');

            return $codeLanguage;
        });

        $this->createMany(10, 'solutionStatuses', function($i) {
            // Create random SolutionStatus to fill solutions.status column
            /**
             * @todo - jak odnieść się referencją do już istniejących statusów, nie robiąc nowych
             */
            $solutionStatus = new SolutionStatus();
            $solutionStatus->setStatus($this->faker->randomElement(SolutionStatus::DEFAULT_SOLUTION_STATUSES));
            $this->manager->persist($solutionStatus);

            return $solutionStatus;
        });

        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
            $solution = new Solution();
            $solution->setSubmittedAt($this->faker->dateTimeBetween('-100 days', '-1 days'));
            $solution->setCodeLanguage($this->getRandomReference('codeLanguages'));
            $solution->setStatus($this->getRandomReference('solutionStatuses'));

            $this->manager->persist($solution);
        }

        $manager->flush ();
    }
}

