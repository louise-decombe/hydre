<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'votre nom
            '
            ])
            ->add('prenom', TextType::class, [
                'label' => 'votre prénom'
            ])
            ->add('email', EmailType::class, [
                'label' => 'nous vous contacterons avec ce mail'
            ])
            ->add('content', TextareaType::class, [
                'label' => 'votre message ici'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'envoyer'
            ])



        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
