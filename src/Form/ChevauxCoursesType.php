<?php

namespace App\Form;

use App\Entity\Chevaux;
use App\Entity\ChevauxCourses;
use App\Entity\Courses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ChevauxCoursesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('resultat')
            //->add('leCheval')
            ->add('leCheval', EntityType::class, array(
                'class'        => Chevaux::class,
                'choice_label' => 'nomCheval',
                'multiple' => false  
            ))

            //->add('laCourse')
            ->add('laCourse', EntityType::class, array(
                'class'        => Courses::class,
                'choice_label' => 'nomCourse',
                'multiple' => false  
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ChevauxCourses::class,
        ]);
    }
}
