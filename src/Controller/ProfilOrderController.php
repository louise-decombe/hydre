<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilOrderController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/profil/mes-commandes", name="profil_order")
     */
    public function index(): Response
    {

        $orders = $this->entityManager->getRepository(Order::class)->findSuccessOrders($this->getUser());
        // on veut afficher pour le user les commandes qui sont 1) payées + 2) par ordre croissant

        return $this->render('profil/order.html.twig', [
            'orders' => $orders
        ]);
    }

/**
     * @Route("/profil/mes-commandes/{reference}", name="profil_order_follow")
     */
    public function show($reference): Response
    {

        $order =$this->entityManager->getRepository(Order::class)->findOneByReference($reference);


        if($order->getUser() != $this->getUser()) {
            return $this->redirectToRoute('profil_order');
        }

        return $this->render('profil/order_follow.html.twig', [
            'order' => $order
        ]);
    }


}
