<?php

// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Entity\Post;
use App\Form\CreatePost;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("/posts", name="create_post")
     */
    public function register(Request $request)
    {
        $post = new Post();
        $form = $this->createForm(CreatePost::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $user = $this->getUser();
            $formData->setUserId($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formData);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render(
            'posts/post.html.twig',
            array('form' => $form->createView())
        );
    }
}
