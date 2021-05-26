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
        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
            /**
             * @todo - jak dodac randomowy rekord z innej tabeli inaczej niz w ten sposob:
             */
            // Create random CodeLanguage to fill solutions.code_language column
            $codeLanguage = new CodeLanguage();
            $codeLanguage->setJdoodleCode('random_code');
            $codeLanguage->setName('random_name');
            $this->manager->persist($codeLanguage);

            // Create random SolutionStatus to fill solutions.status column
            $solutionStatus = new SolutionStatus();
            $solutionStatus->setStatus('RECEIVED');
            $this->manager->persist($solutionStatus);

            $solution = new Solution();
            $solution->setSubmittedAt($this->faker->dateTimeBetween('-100 days', '-1 days'));
            $solution->setCodeLanguage($codeLanguage);
            $solution->setStatus($solutionStatus);

            $this->manager->persist($solution);
        }

        $manager->flush ();
    }
}

