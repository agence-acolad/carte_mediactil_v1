<?php

namespace App\Form;

use App\Entity\Onglet;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OngletType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('ongletCategories', EntityType::class, [
                'choice_label'=> 'nom',
                'class'=> Categorie::class,
                'label'=>'Choisir une ou plusieurs cétegories',
                'multiple' => true,
                'expanded' => true,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Onglet::class,
        ]);
    }
}
