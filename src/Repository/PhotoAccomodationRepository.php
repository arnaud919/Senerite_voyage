<?php

namespace App\Repository;

use App\Entity\PhotoAccomodation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PhotoAccomodation>
 *
 * @method PhotoAccomodation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoAccomodation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoAccomodation[]    findAll()
 * @method PhotoAccomodation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoAccomodationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoAccomodation::class);
    }

    //    /**
    //     * @return PhotoAccomodation[] Returns an array of PhotoAccomodation objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PhotoAccomodation
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findOnePhotoByAField($value): array
    {
        return $this->createQueryBuilder('PhotoAccomodation')
            ->andWhere('PhotoAccomodation.accomodation = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
        ;
    }
}
