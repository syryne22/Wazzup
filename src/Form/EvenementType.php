<?php

namespace App\Form;

use App\Entity\Evenement;
use App\Entity\Utilisateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEvent')
            ->add('nbrParticipants')
            ->add('dateEvent')
            ->add('typeEvent')
            ->add('eventVisibilite')
            ->add('description')
            ->add('dateP',DateTimeType::class)
            ->add('idUtilisateur',EntityType::class,['class'=>Utilisateurs::class,'choice_label'=>'nom'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
