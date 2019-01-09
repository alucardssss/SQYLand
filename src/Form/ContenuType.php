<?php

namespace App\Form;

use App\Entity\Contenu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('summaryText1')
            ->add('summaryLien1')
            ->add('summaryBouton1')
            ->add('summaryText2')
            ->add('summaryLien2')
            ->add('summaryBouton2')
            ->add('imagePanoHead')
            ->add('imagePanoPresentation')
            ->add('imagePanoContact')
            ->add('imagePanoInscription')
            ->add('imagePanoConnexion')
            ->add('imagePanoResultat')
            ->add('presentationImage')
            ->add('presentationText')
            ->add('mentions')
            ->add('presse')
            ->add('presseDoc')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contenu::class,
        ]);
    }
}
