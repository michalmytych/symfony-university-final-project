<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\Group;
use App\Entity\Post;
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
        $this->createMany(10, 'postsForCourses', function($i) {
            $post = new Post();
            $post->setTitle($this->faker->sentence(1));
            $post->setTextContent($this->faker->text(64));
            $post->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));

            return $post;
        });

        $this->createMany(10, 'groupsForCourses', function($i) {
            $group = new Group();
            $group->setName($this->faker->sentence(1));
            $group->setDescription($this->faker->text(64));
            $group->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));

            return $group;
        });

        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
            $course = new Course();

            $course->setName($this->faker->sentence(4));
            $course->setDescription($this->faker->text(500));
            $course->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));
            $course->addGroup($this->getRandomReference('groupsForCourses'));
            $course->addPost($this->getRandomReference('postsForCourses'));

            $this->manager->persist($course);
        }

        $manager->flush();
    }
}

