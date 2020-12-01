<?php

namespace App\Repository;

use App\Entity\GoupesDeCompetences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GoupesDeCompetences|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoupesDeCompetences|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoupesDeCompetences[]    findAll()
 * @method GoupesDeCompetences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoupesDeCompetencesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GoupesDeCompetences::class);
    }

    // /**
    //  * @return GoupesDeCompetences[] Returns an array of GoupesDeCompetences objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GoupesDeCompetences
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
