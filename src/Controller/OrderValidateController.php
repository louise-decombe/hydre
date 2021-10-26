<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Classe\Mail;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderValidateController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/commande/merci/{stripeSessionId}", name="order_validate")
     */
    public function index(Cart $cart, $stripeSessionId): Response
    {

        $order = $this->entityManager->getRepository(Order::class)->findOneByStripeSessionId($stripeSessionId);

        if (!$order || $order->getUser() != $this->getUser()) {
            return $this->redirectToRoute('home');
        }

        if (!$order->getState() == 0) {

            $cart->remove();
            $order->setState(1);
            $this->entityManager->flush();
        }

        $content = "Bonjour, " . $order->getUser()->getFirstname() . "<br> merci pour votre commande passée dans notre boutique ! Nous tenons au courant de son avancement";
        $mail = new Mail();
        $mail->send($order->getUser()->getEmail(), $order->getUser()->getFirstname(), 'Commande passée dans la boutique', $content);

        return $this->render('order_validate/index.html.twig', [
            'order' => $order
        ]);
    }
}
