<?php

namespace App\Repository;

use App\Entity\Upisi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Upisi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Upisi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Upisi[]    findAll()
 * @method Upisi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UpisiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Upisi::class);
    }


    // /**
    //  * @return Upisi[] Returns an array of Upisi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Upisi
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
