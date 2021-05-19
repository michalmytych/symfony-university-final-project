<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class PostFixtures extends Fixture
{
    protected Generator $faker;

    protected ObjectManager $manager;

    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create ();
        $this->manager = $manager;

        for ($i = 0; $i < 10; ++$i) {
            $post = new Post();

            $post->setTitle($this->faker->sentence);
            $post->setTextContent($this->faker->sentence);
            $post->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));

            $this->manager->persist($post);
        }

        $manager->flush ();
    }
}

