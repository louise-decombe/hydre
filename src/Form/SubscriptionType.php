<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;

class SubscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
        ->add('firstname', TextType::class, 
            [ 'label' => 'Votre prénom',
            'constraints' => new Length(0,3,40)
            ])
        ->add('lastname', TextType::class,
             [ 'label' => 'Votre nom',
             'constraints' => new Length(0,3,40)

            ])
            ->add('email', EmailType::class,
             ['label' => 'Votre mail',
             'constraints' => new Length(0,3,40)

             ]) 
            ->add('password', RepeatedType::class,
             [
                'constraints' => new Length(0,8,100),

            'type'=> PasswordType::class,
             'invalid_message' => 'les deux mots de passe doivent être identiques',
             'required' => true,
             'first_options' => ['label' => 'votre mot de passe'],
             'second_options' => ['label' => 'confirmez le mot de passe']
             ]) 

        ->add('submit', SubmitType::class, ['label' => 'inscription'] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
