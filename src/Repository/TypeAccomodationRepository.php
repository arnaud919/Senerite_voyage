<?php

namespace App\Repository;

use App\Entity\TypeAccomodation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeAccomodation>
 *
 * @method TypeAccomodation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAccomodation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAccomodation[]    findAll()
 * @method TypeAccomodation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAccomodationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeAccomodation::class);
    }

    //    /**
    //     * @return TypeAccomodation[] Returns an array of TypeAccomodation objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?TypeAccomodation
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
