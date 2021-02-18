<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TermsConditionsController extends AbstractController
{
    /**
     * @Route("/terms/conditions", name="terms_conditions")
     */
    public function index(): Response
    {
        return $this->render('terms_conditions/index.html.twig', [
            'controller_name' => 'TermsConditionsController',
        ]);
    }
}
