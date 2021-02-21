<?php

namespace App\Repository;

use App\Entity\AboutUsController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AboutUsController|null find($id, $lockMode = null, $lockVersion = null)
 * @method AboutUsController|null findOneBy(array $criteria, array $orderBy = null)
 * @method AboutUsController[]    findAll()
 * @method AboutUsController[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AboutUsControllerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AboutUsController::class);
    }

    // /**
    //  * @return AboutUsController[] Returns an array of AboutUsController objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AboutUsController
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
