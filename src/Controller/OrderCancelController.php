<?php

namespace App\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderCancelController extends AbstractController
{


    private $entityManager;

    public function __construct( EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/commande/erreur/{StripeSessionId}", name="order_fail")
     */
    public function index($stripeSessionId): Response
    {
        $order = $this->entityManager->getRepository(Order::class)->findOneByStripeSessionId($stripeSessionId);

        if(!$order || $order->getUser()!= $this->getUser()){
            return $this->redirectToRoute('home');
        }

        // ici il faudrait envoyer un mail pour dire que le paiement a échoué.

        return $this->render('order_fail/index.html.twig', [
            'order' => $order
        ]);
    }
}
