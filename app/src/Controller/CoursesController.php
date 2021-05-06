<?php

/**
 * Courses controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CoursesController.
 */
class CoursesController extends AbstractController
{
    /**
     * Index action.
     *
     * @return Response
     *
     * @Route(
     *     "/courses",
     *     methods={"GET"},
     *     name="courses_index"
     * )
     */
    public function index(): Response
    {
        return $this->render ('app/courses/index.html.twig');
    }
}
