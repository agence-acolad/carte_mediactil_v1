<?php

namespace App\Repository;

use App\Entity\Onglet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Onglet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Onglet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Onglet[]    findAll()
 * @method Onglet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OngletRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Onglet::class);
    }

    // /**
    //  * @return Onglet[] Returns an array of Onglet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Onglet
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
