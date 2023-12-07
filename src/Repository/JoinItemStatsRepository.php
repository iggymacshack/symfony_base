<?php

namespace App\Repository;

use App\Entity\JoinItemStats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JoinItemStats>
 *
 * @method JoinItemStats|null find($id, $lockMode = null, $lockVersion = null)
 * @method JoinItemStats|null findOneBy(array $criteria, array $orderBy = null)
 * @method JoinItemStats[]    findAll()
 * @method JoinItemStats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoinItemStatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JoinItemStats::class);
    }

//    /**
//     * @return JoinItemStats[] Returns an array of JoinItemStats objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?JoinItemStats
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
