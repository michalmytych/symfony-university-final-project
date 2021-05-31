<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\Group;
use App\Entity\Post;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends AbstractBaseFixtures
{
    const FIXTURES_AMOUNT = 50;

    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'coursesForPosts', function($i) {
            $course = new Course();
            $course->setName($this->faker->sentence(1));
            $course->setDescription($this->faker->text(64));
            $course->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));

            return $course;
        });

        $this->createMany(10, 'groupsForPosts', function($i) {
            $group = new Group();
            $group->setName($this->faker->sentence(1));
            $group->setDescription($this->faker->text(64));
            $group->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));

            return $group;
        });

        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
            $post = new Post();

            $post->setTitle($this->faker->sentence);
            $post->setTextContent($this->faker->sentence);
            $randomDatetime = $this->faker->dateTimeBetween('-100 days', '-1 days');
            $post->setCreatedAt($randomDatetime);
            $post->setChangedAt($randomDatetime);
            $post->addCourse($this->getRandomReference('coursesForPosts'));
            $post->addGroup($this->getRandomReference('groupsForPosts'));

            $this->manager->persist($post);
        }

        $manager->flush();
    }
}

