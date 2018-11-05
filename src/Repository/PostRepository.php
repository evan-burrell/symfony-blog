<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function getPostsWithEmail()
    {
        return $this->createQueryBuilder('p')
        ->join('p.userId', 'u')
        ->addSelect('p', 'u.email')
        ->getQuery()
        ->getResult(Query::HYDRATE_ARRAY);
    }
}
