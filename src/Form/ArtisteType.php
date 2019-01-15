<?php

namespace App\Form;

use App\Entity\Artiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            ->add('type',TextType::class, [
                'label' => 'Saisissez votre type',
                'attr' => [
                    'placeholder' => 'Saisissez votre type'
                ]
            ])
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
