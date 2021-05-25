<?php

namespace App\Repository;

use App\Entity\CodeLanguage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CodeLanguage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodeLanguage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodeLanguage[]    findAll()
 * @method CodeLanguage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodeLanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CodeLanguage::class);
    }

    // /**
    //  * @return CodeLanguage[] Returns an array of CodeLanguage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CodeLanguage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
