<?php

namespace App\Controller;

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
        $query = $this->getDoctrine()->getRepository('App:Post')->getPostsWithEmail();
        return new JsonResponse($query);
    }
}

