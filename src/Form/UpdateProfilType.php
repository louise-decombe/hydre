<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UpdateProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true
            ])
            ->add('firstname', TextType::class, [
                'disabled' => true
            ])
            ->add('lastname', TextType::class, [
                'disabled' => true
            ])
            ->add('old_password', PasswordType::class, [
                'mapped' => false,
                'attr' => 
                [
                    'placeholder' =>'veuillez saisir votre mot de passe actuel']
            ])
            ->add('new_password', RepeatedType::class,
            [
               'constraints' => new Length(0,8,100),
                'mapped' => false,
           'type'=> PasswordType::class,
            'invalid_message' => 'les deux mots de passe doivent être identiques',
            'required' => true,
            'first_options' => ['label' => 'mon nouveau mot de passe'],
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
