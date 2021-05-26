<?php

namespace App\DataFixtures;

use App\Entity\SolutionStatus;
use Doctrine\Persistence\ObjectManager;

class SolutionStatusFixtures extends AbstractBaseFixtures
{
    const DEFAULT_SOLUTION_STATUSES = [
        'RECEIVED',
        'SAVING_TO_DATABASE',
        'SAVED_TO_DATABASE',
        'SENDING',
        'SENT',
        'CHECKING',
        'REJECTED',
        'ACCEPTED',
        'CHECKING_LIMITS',
        'FILE_SIZE_LIMIT_EXCEEDED',
        'MEMORY_LIMIT_EXCEEDED',
        'EXECUTION_TIME_LIMIT_EXCEEDED',
    ];

    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        foreach (self::DEFAULT_SOLUTION_STATUSES as $status) {
            $solutionStatus = new SolutionStatus();
            $solutionStatus->setStatus($status);

            $this->manager->persist($solutionStatus);
        }

        $manager->flush();
    }
}

