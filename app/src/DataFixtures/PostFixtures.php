<?php

namespace App\DataFixtures;

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
        for ($i = 0; $i < self::FIXTURES_AMOUNT; ++$i) {
            $post = new Post();

            $post->setTitle($this->faker->sentence);
            $post->setTextContent($this->faker->sentence);
            $post->setCreatedAt($this->faker->dateTimeBetween ('-100 days', '-1 days'));

            $this->manager->persist($post);
        }

        $manager->flush();
    }
}

