<?php

namespace App\Repository;

use App\Entity\TextTrack;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TextTrack|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextTrack|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextTrack[]    findAll()
 * @method TextTrack[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextTrackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextTrack::class);
    }

    // /**
    //  * @return TextTrack[] Returns an array of TextTrack objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TextTrack
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
