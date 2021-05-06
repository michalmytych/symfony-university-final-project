<?php
/**
 * Homepage controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController.
 */
class HomeController extends AbstractController
{
    /**
     * Index action.
     *
     * @param string $name
     * @return Response
     *
     * @Route(
     *     "/home/{name}",
     *     methods={"GET"},
     *     name="home_index",
     *     defaults={"name":"world"},
     *     requirements={"name": "[a-zA-Z]+"}
     * )
     */
    public function index(string $name): Response
    {
        return $this->render(
            'home/index.html.twig',
            ['name' => $name]
        );
    }
}