<?php

namespace App\Controller\Admin;

use App\Entity\Destination;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DestinationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Destination::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextareaField::new('description'),
            IntegerField::new('price'),
            IntegerField::new('duration'),

            ImageField::new('image')
                ->setBasePath('uploads/destinations')
                ->setUploadDir('public/uploads/destinations')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired($pageName === 'new')
        ];
    }
}
