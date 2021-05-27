<?php
/**
 * Base fixtures.
 */

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use http\Exception\InvalidArgumentException;

abstract class AbstractBaseFixtures extends Fixture
{
    /**
     * Faker.
     */
    protected Generator $faker;

    /**
     * Persistence object manager.
     */
    protected ObjectManager $manager;

    /**
     * Index of all references (related entities).
     *
     * @var array
     */
    private array $referencesIndex = [];

    /**
     * Create many related objects at once:
     * @example
     *
     *      $this->>createMany(10, function(int $i) {
     *          $user = new User();
     *          $user->setFirstName('Ryan);
     *          return $user;
     *      });
     *
     * @param int $amount           Amount of objects to create.
     * @param string $groupName     Tag there created objects with this group name,
     *                              and ust this later with getRandomReference(s)
     *                              to fetch only from this specific group.
     * @param callable $factory     Defines method of object creation.
     */
    protected function createMany(int $amount, string $groupName, callable $factory) : void
    {
        for ($i = 0; $i < $amount; ++$i) {
            $entity = $factory($i);

            if (null === $entity) {
                throw new \LogicException('Did you forget to return the entity object from your callback to BaseFixture::createMany()?');
            }

            $this->manager->persist($entity);

            // store for usage later as groupName_#COUNT#
            $this->addReference(sprintf('%s_%d', $groupName, $i), $entity);
        }
    }

    /**
     * Get array of objects references based on amount.
     *
     * @param string $groupName     Objects group name.
     * @param int $amount           Amount of references to get.
     * @return array                Array of references.
     */
    protected function getRandomReferences(string $groupName, int $amount) : array
    {
        $references = [];
        while (count($references) < $amount) {
            $references[] = $this->getRandomReference($groupName);
        }

        return $references;
    }

    /**
     * @param string $groupName     Objects group name.
     * @return object               Random object reference.
     */
    protected function getRandomReference(string $groupName) : object
    {
        if(! isset($this->referencesIndex[$groupName])) {
            $this->referencesIndex[$groupName] = [];

            foreach($this->referenceRepository->getReferences() as $key => $reference) {
                if (0 === strpos($key, $groupName . '_')) {
                    $this->referencesIndex[$groupName][] = $key;
                }
            }
        }

        if (empty($this->referencesIndex[$groupName])) {
            throw new InvalidArgumentException(sprintf('Did not find any references saved with the group name "%s"', $groupName));
        }

        $randomReferenceKey = $this->faker->randomElement($this->referencesIndex[$groupName]);

        return $this->getReference($randomReferenceKey);
    }

    /**
     * Load objects with entity manager.
     *
     * @param ObjectManager $manager Persistence object manager
     */
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;
        $this->faker = Factory::create();
        $this->loadData($manager);
    }

    /**
     * Load data.
     *
     * @param ObjectManager $manager Persistence object manager
     */
    abstract protected function loadData(ObjectManager $manager): void;
}