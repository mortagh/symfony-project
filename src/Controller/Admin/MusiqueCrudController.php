<?php

namespace App\Controller\Admin;

use App\Entity\Musique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class MusiqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Musique::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            AssociationField::new('artiste')
        ];
    }

}
