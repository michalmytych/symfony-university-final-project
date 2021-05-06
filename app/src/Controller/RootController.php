<?php
/**
 * Root controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RootController.
 */
class RootController extends AbstractController
{
    /**
     * Index action - redirect to HomeController.
     *
     * @return Response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="root_index",
     * )
     */
    public function index(): Response
    {
        return $this->redirectToRoute('home_index');
    }
}
