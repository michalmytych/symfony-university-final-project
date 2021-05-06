<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Post controller - on route /dashboard.
 * @Route("/dashboard")
 */
class PostController extends AbstractController
{
    /**
     * Index action.
     *
     * @param PostRepository $postRepository
     * @return Response
     *
     * @Route( "/dashboard", methods={"GET"}, name="dashboard_index")
     */
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('app/dashboard/index.html.twig', [
            'posts' => $postRepository->findAll()
        ]);
    }

    /**
     * Store new post
     *
     * @param Request $request
     * @return Response
     *
     * @Route("/new", name="dashboard_new", methods={"GET","POST"})
     */
    public function store(Request $request): Response
    {
        /**
         * @todo - przemiescic tworzenie nowego postu do PostRepository
         */
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('dashboard_index');
        }

        return $this->render('app/dashboard/new.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Show single post
     *
     * @param Post $post
     * @return Response
     *
     * @Route("/{id}", name="dashboard_show", methods={"GET"})
     */
    public function show(Post $post): Response
    {
        return $this->render('app/dashboard/show.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * Show editing form for single post
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     *
     * @todo - moze zmienic na metode put?
     *
     * @Route("/{id}/edit", name="dashboard_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Post $post): Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dashboard_index');
        }

        return $this->render('app/dashboard/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Show deletion confirmation form, on POST delete post
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     *
     * @todo - moze zmienic na metode delete?
     *
     * @Route("/{id}", name="dashboard_delete", methods={"POST"})
     */
    public function delete(Request $request, Post $post): Response
    {
        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($post);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dashboard_index');
    }
}
