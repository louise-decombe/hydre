<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\User;
use App\Form\SubscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;

class SubscriptionController extends AbstractController
{

        private $entityManager;

        public function __construct( EntityManagerInterface $entityManager )
        {
            $this->entityManager = $entityManager;
        }

      /**
     * @Route("/inscription", name="subscription")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {   

        // notifier à l'utilisateur qu'il a été inscrit au départ var null.
$notification = null;
$user = new User();
$form = $this->createForm(SubscriptionType::class, $user);
 $form->handleRequest($request);


 // condition formulaire est soumis et valide
 if($form->isSubmitted() && $form->isValid()){
     $user = $form->getData();


     // est ce que l'utilisateur existe déjà ?

     $search_email = $this->entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());


     if(!$search_email)
{

     // le mdp est chiffré
$password = $encoder->encodePassword($user, $user->getPassword());
$user->setPassword($password);




//on atteint l'entité manager
$doctrine = $this->getDoctrine()->getManager();
$doctrine->persist($user);
//flush veut dire exécuter
$doctrine->flush();


$notification = "Votre inscription a été faire";


} else {

    $notification = "Cet email est déjà pris";
}


 }

        return $this->render('subscription/index.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
