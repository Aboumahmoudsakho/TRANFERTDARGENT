<?php

namespace App\Repository;

use App\Entity\Supadmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Supadmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Supadmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Supadmin[]    findAll()
 * @method Supadmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupadminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Supadmin::class);
    }

    // /**
    //  * @return Supadmin[] Returns an array of Supadmin objects
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
    public function findOneBySomeField($value): ?Supadmin
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
