<?php

namespace App\Controller;

use Carbon\Carbon;
use App\Entity\Post;
use App\Form\PostType;
use Cocur\Slugify\Slugify;
use App\Factory\PostFactory;
use App\Factory\SlugFactory;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/post")
 */
class PostController extends AbstractController
{
    private $postFactory;
    private $slugFactory;

    public function __construct(PostFactory $postFactory, SlugFactory $slugFactory)
    {
        $this->postFactory = $postFactory;
        $this->slugFactory = $slugFactory;
    }

    /**
     * @Route("/new", name="post_new", methods="GET|POST")
     */
    public function new(Request $request) : Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $post = $this->postFactory->create();
        $slugify = $this->slugFactory->create();
        $form = $this->createForm(PostType::class, $post);
        $date = Carbon::parse(Carbon::now());


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Set userId and slugify title
            $formData = $form
                ->getData()
                ->setUsername($this->getUser()->getUsername())
                ->setSlug($slugify->slugify($form->getData()->getTitle() . '-' . $date->isoFormat('SSS')));

            // Flash message for created
            $this->addFlash(
                'notice',
                'Post created'
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formData);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render(
            'post/new.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/{slug}", name="post_show", methods="GET")
     */
    public function show(Post $post) : Response
    {
        return $this->render('post/show.html.twig', ['post' => $post]);
    }

    /**
     * @Route("/{id}/edit", name="post_edit", methods="GET|POST")
     */
    public function edit(Request $request, Post $post) : Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('post_show', ['slug' => $post->getSlug()]);
        }

        return $this->render('post/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="post_delete", methods="DELETE")
     */
    public function delete(Request $request, Post $post) : Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if ($this->isCsrfTokenValid('delete' . $post->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
        }

        return $this->redirectToRoute('home');
    }
}
