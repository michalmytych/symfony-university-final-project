<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Psr\Log\LoggerInterface;

class PostRepository extends ServiceEntityRepository
{
    /**
     * Items per page (for paginator).
     *
     * @constant int
     */
    const PAGINATOR_ITEMS_PER_PAGE = 10;

    private LoggerInterface $logger;

    /**
     * PostRepository constructor.
     *
     * @param ManagerRegistry $registry
     * @param LoggerInterface $logger
     */
    public function __construct(ManagerRegistry $registry, LoggerInterface $logger)
    {
        parent::__construct($registry, Post::class);
        $this->logger = $logger;
    }

    /**
     * Query all records.
     *
     * @return QueryBuilder Query builder
     */
    public function queryAll(): QueryBuilder
    {
        return $this->getOrCreateQueryBuilder()
            ->orderBy('post.created_at', 'DESC');
    }

    /**
     * Method for saving Post entities to database with basic error handling.
     *
     * @param Post $postEntity
     */
    public function save(Post $postEntity) : void
    {
        $entityManager = $this->getEntityManager();
        try {
            $entityManager->persist($postEntity);
            $entityManager->flush();
        } catch (Exception $e) {
            /**
             * @todo - czy trzeba tutaj obsługiwać błędy?
             */
            $this->logger->error(
                'Exception thrown',
                [
                    'errorCode' => $e->getCode(),
                    'errorMessage' => $e->getMessage()
                ]);
        }
    }

    /**
     * Remove selected Post entity from database.
     *
     * @param Post $postEntity
     */
    public function destroy(Post $postEntity) : void
    {
        $entityManager = $this->getEntityManager();
        try {
            $entityManager->remove($postEntity);
            $entityManager->flush();
        } catch (Exception $e) {
            $this->logger->error('Exception thrown',
                [
                    'errorCode' => $e->getCode(),
                    'errorMessage' => $e->getMessage()
                ]);
        }
    }

    /**
     * Get or create new query builder.
     *
     * @param QueryBuilder|null $queryBuilder
     * @return QueryBuilder Query builder
     */
    private function getOrCreateQueryBuilder(QueryBuilder $queryBuilder = null): QueryBuilder
    {
        return $queryBuilder ?? $this->createQueryBuilder('post');
    }
}
