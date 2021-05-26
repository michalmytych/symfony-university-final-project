<?php

namespace App\DataFixtures;

use App\Entity\Group;
use Doctrine\Persistence\ObjectManager;

class GroupFixtures extends AbstractBaseFixtures
{
    const FIXTURES_AMOUNT = 50;

    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
            $group = new Group();

            $group->setName($this->faker->sentence(4));
            $group->setDescription($this->faker->text(500));
            $group->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));
            /**
             * @todo - add relations fixtures (random references)
             */
            // $group->addCourse();

            $this->manager->persist($group);
        }

        $manager->flush();
    }
}

