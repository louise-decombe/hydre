<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SubscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SubscriptionController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/inscription", name="subscription")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {

        $notification = null;
        $user = new User();
        $form = $this->createForm(SubscriptionType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $search_email = $this->entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());

            if (!$search_email) {

                $password = $encoder->encodePassword($user, $user->getPassword());
                $user->setPassword($password);

                $doctrine = $this->getDoctrine()->getManager();
                $doctrine->persist($user);
                $doctrine->flush();

                $notification = "Votre inscription a été prise en compte !";

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
