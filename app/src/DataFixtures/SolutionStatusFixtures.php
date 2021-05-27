<?php

namespace App\DataFixtures;

use App\Entity\SolutionStatus;
use Doctrine\Persistence\ObjectManager;

class SolutionStatusFixtures extends AbstractBaseFixtures
{
    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        foreach (SolutionStatus::DEFAULT_SOLUTION_STATUSES as $status) {
            $solutionStatus = new SolutionStatus();
            $solutionStatus->setStatus($status);

            $this->manager->persist($solutionStatus);
        }

        $manager->flush();
    }
}

