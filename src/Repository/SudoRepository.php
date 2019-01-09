<?php

namespace App\Repository;

use App\Entity\sudo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method sudo|null find($id, $lockMode = null, $lockVersion = null)
 * @method sudo|null findOneBy(array $criteria, array $orderBy = null)
 * @method sudo[]    findAll()
 * @method sudo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SudoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, sudo::class);
    }

    // /**
    //  * @return sudo[] Returns an array of sudo objects
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
    public function findOneBySomeField($value): ?sudo
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
