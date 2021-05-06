<?php
/**
 * Dashboard controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DashboardController.
 */
class DashboardController extends AbstractController
{
    /**
     * Index action.
     *
     * @return Response
     *
     * @Route(
     *     "/dashboard",
     *     methods={"GET"},
     *     name="dashboard_index",
     * )
     */
    public function index(): Response
    {
        return $this->render('app/dashboard/index.html.twig');
    }
}