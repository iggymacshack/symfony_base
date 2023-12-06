<?php

namespace App\Repository;

use App\Entity\WeaponAttackSpeed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeaponAttackSpeed>
 *
 * @method WeaponAttackSpeed|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeaponAttackSpeed|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeaponAttackSpeed[]    findAll()
 * @method WeaponAttackSpeed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeaponAttackSpeedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeaponAttackSpeed::class);
    }

//    /**
//     * @return WeaponAttackSpeed[] Returns an array of WeaponAttackSpeed objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WeaponAttackSpeed
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
