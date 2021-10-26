<?php

namespace App\Controller\Admin;

use App\Classe\Mail;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;

class OrderCrudController extends AbstractCrudController
{

    private $entityManager;
    private $crudUrlGenerator;

    public function __construct(EntityManagerInterface $entityManager, CrudUrlGenerator $crudUrlGenerator)
    {
        $this->entityManager = $entityManager;
        $this->crudUrlGenerator = $crudUrlGenerator;
    }

    public static function getEntityFqcn(): string
    {
        return Order::class;
    }

    public function configureActions(Actions $actions): Actions
    {

        $updatePreparation = Action::new('updatePreparation', 'préparation en cours /', 'fas fa-arrow')->linkToCrudAction('updatePreparation');
        $updateReady = Action::new('updateReady', 'commande prête /', 'fas fa-arrow')->linkToCrudAction('updateReady');

        return $actions
            ->add('detail', $updatePreparation)
            ->add('detail', $updateReady)
            ->add('index', 'detail');
    }

    public function updatePreparation(AdminContext $adminContext): \Symfony\Component\HttpFoundation\RedirectResponse
    {

        $order = $adminContext->getEntity()->getInstance();
        $order->setState(2);
        $this->entityManager->flush();

        $this->addFlash('notice', "<strong>la commande  " . $order->getReference() . "a bien été mise à jour </strong>");

        $url = $this->crudUrlGenerator->build()
            ->setController(OrderCrudController::class)
            ->setAction('index')
            ->generateUrl();

        $content = "Bonjour,<br> Votre commande " . $order->getReference() . "est en cours de préparation";
        $mail = new Mail();
        $mail->send($order->getUser()->getEmail(), $order->getUser(), 'Votre commande est en cours de préparation, vous recevrez un mail lorsque vous pourrez venir la récupérer', $content);

        return $this->redirect($url);
    }

    public function updateReady(AdminContext $adminContext): \Symfony\Component\HttpFoundation\RedirectResponse
    {

        $order = $adminContext->getEntity()->getInstance();
        $order->setState(3);
        $this->entityManager->flush();

        $this->addFlash('notice', "<strong>la commande  " . $order->getReference() . "est prête à être récupérée </strong>");

        $url = $this->crudUrlGenerator->build()
            ->setController(OrderCrudController::class)
            ->setAction('index')
            ->generateUrl();

        $content = "Bonjour," . $order->getUser()->getFirstname() . "<br> Votre commande est prête à être récupérée";
        $mail = new Mail();
        $mail->send($order->getUser()->getEmail(), $order->getUser()->getFirstname(), 'Votre commande' . $order->getReference() . 'est prête, vous pouvez venir la récupérer à la boutique.', $content);

        return $this->redirect($url);
        <
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            DateTimeField::new('createdAt', 'date commande'),
            TextField::new('user.getFullname', 'nom client'),
            TextEditorField::new('user.getEmail', 'mail de contact')->onlyOnDetail(),
            MoneyField::new('total')->setCurrency('EUR'),
            ChoiceField::new('state')->setChoices([
                'attente de paiement' => 0,
                'payé' => 1,
                'préparation en cours' => 2,
                'prêt à être récupéré' => 3
            ]),
            ArrayField::new('orderDetails', 'produits achetés')->hideOnIndex()

        ];
    }

}