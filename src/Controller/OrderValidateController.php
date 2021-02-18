<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Classe\Mail;
use App\Entity\User;
use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class OrderValidateController extends AbstractController
{

    private $entityManager;

    public function __construct( EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/commande/merci/{stripeSessionId}", name="order_validate")
     */
    public function index( Cart $cart, $stripeSessionId): Response
    {

        $order = $this->entityManager->getRepository(Order::class)->findOneByStripeSessionId($stripeSessionId);

        if(!$order || $order->getUser()!= $this->getUser()){
            return $this->redirectToRoute('home');
        }

        if(!$order->getState() == 0) {

            // vider la session du panier 

            $cart->remove();

            $order->setState(1);
            $this->entityManager->flush();
        }

        //modifier le statut  de la commande.

        // envoyer un email à notre client pour confirmer sa commande

        //$content = "Bonjour, bonsoir".$order->getUser()->getFirstname."<br> Votre inscription a réussi !";
        //$mail = new Mail();
        //$mail->send($order->getUser()->getEmail(), $order->getUser()->getFirstname(),'Bienvenue dans la boutique', $content );

        return $this->render('order_validate/index.html.twig', [
            'order' => $order
        ]);
    }
}
