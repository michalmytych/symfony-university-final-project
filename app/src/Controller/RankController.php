<?php
/**
 * Rank controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RankController.
 */
class RankController extends AbstractController
{
    /**
     * Index action.
     *
     * @return Response
     *
     * @Route(
     *     "/rank",
     *     methods={"GET"},
     *     name="rank_index",
     * )
     */
    public function index(): Response
    {
        return $this->render('app/rank/index.html.twig');
    }
}