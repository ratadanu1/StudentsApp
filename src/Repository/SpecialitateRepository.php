<?php

namespace App\Repository;

use App\Entity\Specialitate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Specialitate>
 *
 * @method Specialitate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specialitate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specialitate[]    findAll()
 * @method Specialitate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialitateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specialitate::class);
    }

//    /**
//     * @return Specialitate[] Returns an array of Specialitate objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Specialitate
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
