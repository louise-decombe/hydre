<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutUsController extends AbstractController
{
    /**
     * @Route("/a-propos-de-nous", name="about-us")
     */
    public function index(): Response
    {
        return $this->render('about_us/index.html.twig');
    }
}
