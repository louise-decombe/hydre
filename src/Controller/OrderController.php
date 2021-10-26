<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Order;
use App\Entity\OrderDetails;
use App\Form\OrderType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/commande", name="order")
     */
    public function index(Cart $cart, Request $request)
    {

        if (!$this->getUser()->getAddresses()->getValues()) {

            return $this->redirectToRoute('profil_address_add');
        }

        // ici je passe les paramètres pour afficher les adresses de mon utilisateur en cours
        $form = $this->createForm(OrderType::class, null, [
            'user' => $this->getUser()
        ]);

        $form->handleRequest($request);


        //je retourne le formulaire cad les boutons radio pour choisir les adresses de l'utilisateur
        return $this->render('order/index.html.twig', [
            'form' => $form->createView(),
            'cart' => $cart->getFull()
        ]);
    }


    /**
     * @Route("/commande/recapitulatif", name="order_recap", methods={"POST"})
     */
    public function add(Cart $cart, Request $request)
    {

        // ici je passe les paramètres pour afficher les adresses de mon utilisateur en cours
        $form = $this->createForm(OrderType::class, null, [
            'user' => $this->getUser()
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $date = new DateTime();

            $delivery = $form->get('addresses')->getData();
            $delivery_content = $delivery->getFirstname() . ' ' . $delivery->getLastname();
            if ($delivery->getCompany()) {
                $delivery_content .= '<br>' . $delivery->getCompany();
            }


            $delivery_content .= '<br>' . $delivery->getAddress();
            $delivery_content .= '<br>' . $delivery->getPostal();
            $delivery_content .= '<br>' . $delivery->getCity();
            $delivery_content .= '<br>' . $delivery->getCountry();
            $delivery_content .= '<br>' . $delivery->getPhone();


            $order = new Order();
            $reference = $date->format('dmY') . '-' . uniqid();
            $order->setReference($reference);
            $order->setUser($this->getUser());
            $order->setCreatedAt($date);
            $order->setDelivery($delivery_content);
            $order->setState(1);

            $this->entityManager->persist($order);

            foreach ($cart->getFull() as $product) {
                $orderDetails = new OrderDetails();
                $orderDetails->setMyOrder($order);
                $orderDetails->setProduct($product['product']->getName());
                $orderDetails->setQuantity($product['quantity']);
                $orderDetails->setPrice($product['product']->getPrice());
                $orderDetails->setTotal($product['product']->getPrice() * $product['quantity']);
                $this->entityManager->persist($orderDetails);

            }

            $this->entityManager->flush();

            return $this->render('order/add.html.twig', [
                'cart' => $cart->getFull(),
                'delivery' => $delivery_content,
                'reference' => $order->getReference()
            ]);
        }

        return $this->redirectToRoute('cart');

    }

}
