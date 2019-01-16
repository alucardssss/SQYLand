<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Categorie;
use App\Entity\Projet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtisteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nom', TextType::class, [
                'label' => 'Saisissez votre Nom',
                'attr' => [
                    'placeholder' => 'Saisissez votre Nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Saisissez votre Email',
                'attr' => [
                    'placeholder' => 'Saisissez votre Email'
                ]
            ])
            ->add('mdp', PasswordType::class, [
                'label' => 'Saisissez votre mot de passe',
                'attr' => [
                    'placeholder' => 'Saisissez votre mot de passe'
                ]
            ])
            ->add('image',FileType::class, [
                'required' => false,
                'label' => 'Ajoutez une image à votre profil ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('resume', TextareaType::class, [
                'required' => false,
                'label' => 'Ajouter un descriptif de votre profil',
                'attr' => [
                    'placeholder' => 'Ajouter un descriptif de votre profil'
                ]
            ])
           # ->add('projet_id', EntityType::class, [
           #     'class' => Projet::class,
           #     'required' => false,
           #     'label' => 'Selectionner un projet',
           #     'attr' => [
           #         'placeholder' => 'votre projet'
           #     ]
           # ])
            ->add('submit', SubmitType::class, [
                'label' => "Je m'inscris !"
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artiste::class,
        ]);
    }
}
