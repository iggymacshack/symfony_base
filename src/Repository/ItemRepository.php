<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Item>
 *
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    public function findAllWithLimit(int $limit):array{
        return $this->createQueryBuilder("i")
        ->orderBy('i.id','ASC')
        ->setMaxResults($limit)
        ->getQuery()
        ->getResult();
    }

    public function findNewest(int $limit):array{
        return $this->createQueryBuilder("i")
        ->orderBy('i.id','DESC')
        ->setMaxResults($limit)
        ->getQuery()
        ->getResult();
    }

    public function itemCount():int{
        return $this->createQueryBuilder("i")
        ->select('COUNT(i.id) AS Count')
        ->getQuery()
        ->getSingleScalarResult();
    }

    public function itemCountByRarity(int $rarity):int{
        return $this->createQueryBuilder("i")
        ->select('COUNT(i.id) AS Count')
        ->andWhere('i.rarity = :rarity')
        ->setParameter('rarity', $rarity)
        ->getQuery()
        ->getSingleScalarResult();
    }

//    /**
//     * @return Item[] Returns an array of Item objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Item
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
