<?php
/**
 * Homepage controller.
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * Index action.
     *
     * @param Request $request
     * @return Response
     *
     * @Route(
     *     "/home",
     *     methods={"GET"},
     *     name="home_index",
     * )
     */
    public function index(Request $request): Response
    {
        $name = $request->query->getAlnum('name');

        return new Response('Hello ' . $name . '!');
    }
}