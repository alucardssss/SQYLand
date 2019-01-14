<?php

namespace App\Form;

use App\Entity\Artiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtisteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('email')
            ->add('mdp')
            ->add('type')
            ->add('resume')
            ->add('image', FileType::class, [
                'required' => false,
                'label' => "Image de profil",
                'attr' => [
                    'class' => 'dropify',
                    'placeholder' => "Image de votre profil"
                ]
            ])
            ->add('dateInscription')
            ->add('dateConnexion')
            ->add('projet')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artiste::class,
        ]);
    }
}
