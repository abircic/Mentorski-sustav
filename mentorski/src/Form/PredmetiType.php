<?php

namespace App\Form;

use App\Entity\Predmeti;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PredmetiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ime')
            ->add('kod')
            ->add('program')
            ->add('bodovi')
            ->add('sem_redovni')
            ->add('sem_izvanredni')
            ->add('izborni')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Predmeti::class,
        ]);
    }
}
