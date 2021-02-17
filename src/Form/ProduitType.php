<?php

namespace App\Form;

use App\Entity\Produit;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,[
                'label' => "Nom du Produit",
                'attr' => [
                    'placeholder' => "Entrez le nom du produit ici"
                ]
            ])
            ->add('description', CKEditorType::class)
            ->add('prix')
            // ->add('photo')
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => "Choisir l'image du produit",
                'attr' => [
                    'placeholder' => "Choisissez votre image"
                ]
            ])
            ->add('ubereats')
            ->add('deliveroo')
            ->add('categories')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
