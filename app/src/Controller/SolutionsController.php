<?php

/**
 * Solutions controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SolutionsController.
 */
class SolutionsController extends AbstractController
{
    /**
     * Index action.
     *
     * @return Response
     *
     * @Route(
     *     "/solutions",
     *     methods={"GET"},
     *     name="solutions_index"
     * )
     */
    public function index(): Response
    {
        return $this->render (
            'app/solutions/index.html.twig'
        );
    }
}
