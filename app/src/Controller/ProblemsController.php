<?php
/**
 * Problems controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProblemsController.
 */
class ProblemsController extends AbstractController
{
    /**
     * Index action.
     *
     * @return Response
     *
     * @Route(
     *     "/problems",
     *     methods={"GET"},
     *     name="problems_index",
     * )
     */
    public function index(): Response
    {
        return $this->render('app/problems/index.html.twig');
    }
}