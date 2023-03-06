<?php

namespace App\Form;

use App\Entity\Chevaux;
use App\Entity\Proprietaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ChevauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomCheval')
            ->add('prixAchat')
            //->add('PrixRevente')
           
           ->add('leProprietaire', EntityType::class, array(
            'class'        => Proprietaires::class,
            'choice_label' => 'nomProprietaire',
            'multiple' => false  
        ))

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chevaux::class,
        ]);
    }
}
