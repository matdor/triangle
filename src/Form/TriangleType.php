<?php

namespace App\Form;

use App\Entity\Triangle;
use Attribute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TriangleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sideA')
            ->add('sideB')
            ->add('sideC')
            ->add('Create', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary float-end'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Triangle::class,
        ]);
    }
}
