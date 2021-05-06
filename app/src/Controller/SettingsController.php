<?php
/**
 * Settings controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SettingsController.
 */
class SettingsController extends AbstractController
{
    /**
     * Index action.
     *
     * @return Response
     *
     * @Route(
     *     "/settings",
     *     methods={"GET"},
     *     name="settings_index",
     * )
     */
    public function index(): Response
    {
        return $this->render('app/settings/index.html.twig');
    }
}