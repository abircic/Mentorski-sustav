<?php

namespace App\Repository;

use App\Entity\Predmeti;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Predmeti|null find($id, $lockMode = null, $lockVersion = null)
 * @method Predmeti|null findOneBy(array $criteria, array $orderBy = null)
 * @method Predmeti[]    findAll()
 * @method Predmeti[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PredmetiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Predmeti::class);
    }

    // /**
    //  * @return Predmeti[] Returns an array of Predmeti objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Predmeti
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
