<?php

namespace App\Form;
use App\Entity\artiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionFormType extends AbstractType
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
            ->add('type',TextType::class, [
                'label' => 'Saisissez votre type',
                'attr' => [
                    'placeholder' => 'Saisissez votre type'
                ]
            ])
            ->add('resume',HiddenType::class)
            ->add('date_inscription',HiddenType::class)
            ->add('date_connexion',HiddenType::class)
            ->add('projet',HiddenType::class)
            ->add('submit', SubmitType::class, [
                'label' => "Je m'inscris !"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => artiste::class,
        ]);
    }
}
