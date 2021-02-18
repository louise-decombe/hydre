<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'quel nom donnez vous à votre adresse ?',
                'attr' => [
                    'placeholder' => 'nom de cette adresse'
                ]
            ])
            ->add('firstname',  TextType::class, [
                'label' => 'prénom',
                'attr' => [
                    'placeholder' => 'prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'nom',
                'attr' => [
                    'placeholder' => 'nom'
                ]
            ])
            ->add('company',  TextType::class, [
                'label' => 'nom d\'entreprise',
                'attr' => [
                    'placeholder' => 'nom de l\'entreprise si elle existe'
                ],
                'required' => false
            ])
            ->add('address',  TextType::class, [
                'label' => 'votre addresse',
                'attr' => [
                    'placeholder' => ' votre adresse'
                ]
            ])
            ->add('postal',  TextType::class, [
                'label' => 'code postal',
                'attr' => [
                    'placeholder' => ' votre code postal'
                ]
            ])
            ->add('city',  TextType::class, [
                'label' => 'ville',
                'attr' => [
                    'placeholder' => ' votre ville'
                ]
            ])
            ->add('phone',  TelType::class, [
                'label' => 'téléphone',
                'attr' => [
                    'placeholder' => ' votre téléphone'
                ]
            ])
            ->add('country',  CountryType::class, [
                'label' => 'pays',
                'attr' => [
                    'placeholder' => ' votre pays'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'ajouter l\'adresse'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
