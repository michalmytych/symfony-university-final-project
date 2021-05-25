<?php

namespace App\Repository;

use App\Entity\SolutionStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SolutionStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method SolutionStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method SolutionStatus[]    findAll()
 * @method SolutionStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolutionStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SolutionStatus::class);
    }

    // /**
    //  * @return SolutionStatus[] Returns an array of SolutionStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SolutionStatus
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
