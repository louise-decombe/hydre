<?php

namespace App\Form;
use App\Entity\Address; 
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $user = $options['user'];
        $builder
            ->add('addresses', EntityType::class, [
                'label' => 'Mes addresses',
                'required' => true,
                'class' => Address::class,
                'choices' => $user->getAddresses(),
                'multiple' => false,
                'expanded' => true,
            ])
->add('submit', SubmitType::class, [
    'label' => 'Valider la commande',
    'attr' => [
        'class' => 'button'
    ]
])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'user' => array()
            ]);
    }
}
