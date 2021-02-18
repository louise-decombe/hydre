<?php

namespace App\Controller;

use App\Form\UpdateProfilType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilUpdateController extends AbstractController
{
    /**
     * @Route("/profil/modifier-profil", name="profil_update")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {

$notification = null;

$user = $this->getUser();
        
$form = $this->createForm(UpdateProfilType::class, $user);

$form->handleRequest($request);

if($form->isSubmitted() && $form->isValid()){

    $old_password = $form->get('old_password')->getData();
    if($encoder->isPasswordValid($user, $old_password)){
$new_password = $form->get('new_password')->getData();
$password = $encoder->encodePassword($user, $new_password);

$user->setPassword($password);
$doctrine = $this->getDoctrine()->getManager();
$doctrine->persist($user);
//flush veut dire exécuter
$doctrine->flush();
$notification = "votre mot de passe a été modifié ";

    } else{
        $notification = "erreur mot de passe";
    }
}

        return $this->render('profil/profil_update.html.twig', [
            'form' => $form->createView(),
            'notification' =>  $notification
        ]);
    }
}
