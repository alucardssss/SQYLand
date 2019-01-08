<?php

namespace App\Repository;

use App\Entity\Sudo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sudo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sudo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sudo[]    findAll()
 * @method Sudo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SudoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sudo::class);
    }

    // /**
    //  * @return Sudo[] Returns an array of Sudo objects
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
    public function findOneBySomeField($value): ?Sudo
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
