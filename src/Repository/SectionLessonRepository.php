<?php

namespace App\Repository;

use App\Entity\SectionLesson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SectionLesson|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionLesson|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionLesson[]    findAll()
 * @method SectionLesson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionLessonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionLesson::class);
    }

    // /**
    //  * @return SectionLesson[] Returns an array of SectionLesson objects
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
    public function findOneBySomeField($value): ?SectionLesson
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
