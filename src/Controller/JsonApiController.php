<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
        $query = $this->getDoctrine()->getRepository('App:Post')->getPostsWithUsername();
        return new JsonResponse($query);
    }
}

