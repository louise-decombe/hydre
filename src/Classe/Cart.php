<?php

namespace App\Classe;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{

    private $session;
    private $entityManager;


    // dès que ma classe est appelée le contructeur est initialisé
    public function __construct(EntityManagerInterface $entityManager, SessionInterface $session)
    {

        $this->session = $session;
        $this->entityManager = $entityManager;


    }

    // ici j'ai besoin de mon session interface pour faire mon panier

    // la variable $id du produit je la récup avec un get id dans mon controleur

    public function add($id)
    {

        $cart = $this->session->get('cart', []);

        // si un article qui a un ID ok est ajouté on ajoute une quantité avec le ++.
        if (!empty($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }


        $this->session->set('cart', $cart);

    }


//récupérer le panier de session
    public function get()
    {
        return $this->session->get('cart');
    }


//supprimer le panier
    public function remove()
    {
        return $this->session->remove('cart');
    }


//supprimer toutes les quantités d'un article du panier
    public function delete($id)
    {
        $cart = $this->session->get('cart', []);

        unset($cart[$id]);

        return $this->session->set('cart', $cart);

    }

//enlever un produit dans le panier (je prend en paramètre sont id)

    public function decrease($id)
    {

        // si j'ai + d'un article je suppr une quantité sinon je suppr le panier

        $cart = $this->session->get('cart', []);


        if ($cart[$id] > 1) {

            $cart[$id]--;
        } else {
            unset($cart[$id]);
        }

        return $this->session->set('cart', $cart);

    }

// retourner tout le contenu du panier
    public function getFull()
    {
        $cartComplete = [];

        if ($this->get()) {
            foreach ($this->get() as $id => $quantity) {
                $product_object = $this->entityManager->getRepository(Product::class)->findOneById($id);

                if (!$product_object) {
                    $this->delete($id);
                    continue;
                }

                $cartComplete[] = [
                    'product' => $product_object,
                    'quantity' => $quantity
                ];
            }
        }

        return $cartComplete;
    }

}