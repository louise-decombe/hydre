<?php

namespace App\Controller\Admin;
use App\Entity\Product;
use App\Entity\Subcategory;
use Doctrine\DBAL\Types\TextType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\SlugType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class Product2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
       {
       return [
TextField::new('name'),
TextField::new('publisher'),
TextField::new('author'),
ImageField::new('illustration')->setBasePath('uploads/')->setUploadDir('public/uploads/')->setUploadedFileNamePattern('[randomhash].[extension]')
->setRequired(false),
SlugField::new('slug')->setTargetFieldName('name'),
TextField::new('subtitle'),
TextareaField::new('description'),
IntegerField::new('stock'),
IntegerField::new('nbe_pages'),
IntegerField::new('year_of_publication'),
MoneyField::new('price')->setCurrency('EUR'),
AssociationField::new('subcategory')
       ];   
    }   
    
}
