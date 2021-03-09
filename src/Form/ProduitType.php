<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,[
                'label' => "Nom du Produit",
                'attr' => [
                    'placeholder' => "SALADE CHICKEN CEASAR"
                ]
            ])
            ->add('description', TextareaType::class,[
                'required' => false,
                'attr' => [
                    'placeholder' => "et son croustillant de poulet"
                ]
            ])
            ->add('prix', NumberType::class,[
                'label' => "Prix en plat",
                'attr' => [
                    'placeholder' => "18"
                ]
            ])
            ->add('prixOptionnel', NumberType::class,[
                'required' => false,
                'label' => "Prix en entrée (optionnel)",
                'attr' => [
                    'placeholder' => "14"
                ]
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => "Choisir l'image du produit",
                'attr' => [
                    'placeholder' => "Choisissez votre image"
                ]
            ])
            ->add('categories', EntityType::class, [
                'choice_label'=> 'nom',
                'class'=> Categorie::class,
                'label'=>'Choisir une ou plusieurs catégories',
                'multiple' => true,
                'expanded' => true,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
