<?php

namespace App\Form;

use App\Entity\SalleCinema;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalleCinemaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomSalle')
            ->add('urlFilm')
            ->add('urlSalle')
            ->add('chat')
            ->add('idEvent')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SalleCinema::class,
        ]);
    }
}
