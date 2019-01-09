<?php

namespace App\Repository;

use App\Entity\contenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method contenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method contenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method contenu[]    findAll()
 * @method contenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenuRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, contenu::class);
    }

    // /**
    //  * @return contenu[] Returns an array of contenu objects
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
    public function findOneBySomeField($value): ?contenu
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
