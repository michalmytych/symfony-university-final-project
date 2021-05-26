<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends AbstractBaseFixtures
{
    const FIXTURES_AMOUNT = 50;

    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
            $course = new Course();

            $course->setName($this->faker->sentence(4));
            $course->setDescription($this->faker->text(500));
            $course->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));

            $this->manager->persist($course);
        }

        $manager->flush();
    }
}

