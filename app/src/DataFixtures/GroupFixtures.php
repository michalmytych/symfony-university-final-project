<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\Group;
use App\Entity\Post;
use App\Entity\Problem;
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
        $this->createMany(10, 'coursesForGroups', function($i) {
            $course = new Course();
            $course->setName($this->faker->sentence(1));
            $course->setDescription($this->faker->text(64));
            $course->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));

            return $course;
        });

        $this->createMany(10, 'postsForGroups', function($i) {
            $post = new Post();
            $post->setTitle($this->faker->sentence(1));
            $post->setTextContent($this->faker->text(64));
            $post->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));

            return $post;
        });

        $this->createMany(10, 'problemsForGroups', function($i) {
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

            return $problem;
        });

        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
            $group = new Group();

            $group->setName($this->faker->sentence(4));
            $group->setDescription($this->faker->text(500));
            $group->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));
            $group->addCourse($this->getRandomReference('coursesForGroups'));
            $group->addPost($this->getRandomReference('postsForGroups'));
            $group->addProblem($this->getRandomReference('problemsForGroups'));


            $this->manager->persist($group);
        }

        $manager->flush();
    }
}

