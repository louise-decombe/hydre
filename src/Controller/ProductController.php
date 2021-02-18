<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends AbstractController
{

    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;

    }


    /**
     * @Route("/nos-produits", name="products")
     */
    public function index( Request $request)
    {


$products = $this->entityManager->getRepository(Product::class)->findAll();



        return $this->render('product/index.html.twig', [
          'products' => $products
            ]);

    }


     /**
     * @Route("/produit/{slug}", name="product")
     */
    public function show($slug): Response
    {

        $product = $this->entityManager->getRepository(Product::class)->findOneBySlug($slug) ;

if(!$product){
    return $this->redirectToRoute('products');
}

        return $this->render('product/single_item.html.twig', [
            'products' => $product
        ]);
    }



}

