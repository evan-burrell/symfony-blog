<?php

namespace App\Repository;

use App\Entity\AuthorPhp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AuthorPhp|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuthorPhp|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuthorPhp[]    findAll()
 * @method AuthorPhp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthorPhpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AuthorPhp::class);
    }

//    /**
//     * @return AuthorPhp[] Returns an array of AuthorPhp objects
//     */
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
    public function findOneBySomeField($value): ?AuthorPhp
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
