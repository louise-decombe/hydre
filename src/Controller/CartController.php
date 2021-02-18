<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{   

    //entitymanager va nous permettre d'appeler DOctrine pour choper les infos des produits qui sont mis dans le panier

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


//route pour le panier

    /**
     * @Route("/panier", name="cart")
     */
    public function index(Cart $cart)
    {
     
      

        return $this->render('cart/index.html.twig', [
            'cart'=> $cart->getFull()
        ]);
    }

 /**
     * @Route("/panier/add/{id}", name="add_cart")
     */
    public function add( Cart $cart, $id)
    {

        $cart->add($id);

        return $this->redirectToRoute('cart');

//        return $this->render('cart/index.html.twig');
    }


 /**
     * @Route("/panier/delete/{id}", name="delete_to_cart")
     */
    public function delete( Cart $cart, $id)
    {

        $cart->delete($id);

        return $this->redirectToRoute('cart');
    }



     /**
     * @Route("/panier/decrease/{id}", name="decrease_to_cart")
     */
    public function decrease( Cart $cart, $id)
    {

        $cart->decrease($id);

        return $this->redirectToRoute('cart');
    }

}
