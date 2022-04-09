<?php

namespace App\Form;

use App\Entity\Evenement;
use App\Entity\Rencontre;
use phpDocumentor\Reflection\Types\ClassString;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RencontreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeRencontre')
            ->add('urlInvitation')
            ->add('idEvent',EntityType::class,[
                "Class"=>Evenement::class,
                "choice_label"=> "nomEvent"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rencontre::class,
        ]);
    }
}
