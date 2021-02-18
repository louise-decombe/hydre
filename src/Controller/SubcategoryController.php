<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubcategoryController extends AbstractController
{
    /**
     * @Route("/categorie{id}/sous-categories", name="subcategory")
     */
    public function index(): Response
    {
        return $this->render('subcategory/index.html.twig');
    }
}
