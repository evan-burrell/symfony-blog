<?php

namespace App\Controller;

use Doctrine\ORM\Query;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/api")
 */
class JsonApiController extends AbstractController
{
    /**
     * @Route("/posts", name="api_posts")
     */
    public function api()
    {
        $query = $this->getDoctrine()
            ->getRepository('App:Post')
            ->createQueryBuilder('p')
            ->join('p.userId', 'u')
            ->addSelect('p', 'u.email')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
        return new JsonResponse($query);
    }
}

