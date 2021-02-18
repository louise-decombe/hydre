<?php

namespace App\Controller;
use App\Classe\Cart;
use App\Entity\Order;
use App\Entity\OrderDetails;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Stripe\Price;
use Symfony\Component\HttpFoundation\JsonResponse;

class StripeController extends AbstractController
{
    /**
     * @Route("/commande/create-session/{reference}", name="stripe_create_session")
     */
    public function index(EntityManagerInterface $entityManger, Cart $cart, $reference): Response
    {

        $products_for_stripe = [];

$YOUR_DOMAIN = 'http://127.0.0.1:8000';

$order = $entityManger->getRepository(Order::class)->findOneByReference($reference);

if(!$order) {
    new  JsonResponse(['error'=> 'order']);
}



foreach($order->getOrderDetails()->getValues() as $product)
{
    $product_object = $entityManger->getRepository(Product::class)->findOneByName($product->getProduct());
    $products_for_stripe[]= [
        'price_data' => [
          'currency' => 'eur',  
          'unit_amount' => $product->getPrice(),
          'product_data' => [
            'name' => $product->getProduct(),
            'images' => [$YOUR_DOMAIN."/uploads/".$product_object->getIllustration()],
          ],
        ],
    
        'quantity' => $product->getQuantity(),
    ];
}

Stripe::setApiKey('sk_test_51IGkgZGmXhpNP8kEm1RBltgLXWBu8idpldMMfPc5RfRFrz2FDnw1nNtkeu8p1Qzsj0FyUhjIfgCoxfFTFPUbgcpC00FXglPBDn');


$checkout_session = Session::create([
  'customer_email' => $this->getUser()->getEmail(),
  'payment_method_types' => ['card'],
  'line_items' => [
      $products_for_stripe
  ],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/commande/merci/{CHECKOUT_SESSION_ID}',
  'cancel_url' => $YOUR_DOMAIN . '/commande/erreur/{CHECKOUT_SESSION_ID}',
]);

$order->setStripeSessionId($checkout_session->id);


$entityManger->flush();

$response = new  JsonResponse(['id'=> $checkout_session->id]);
return $response;

    }
}
