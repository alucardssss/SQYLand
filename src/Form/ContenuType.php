<?php

namespace App\Form;

use App\Entity\Contenu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('summaryText1', TextType::class, [
                'required' => true,
                'label' => 'Saisissez la punchline n°1',
                'attr' => [
                    'placeholder' => 'Saisissez la punchline n°1'
                ]
            ])
            ->add('summaryLien1', TextType::class, [
                'required' => true,
                'label' => 'Saisissez l\'adresse du lien n°1',
                'attr' => [
                    'placeholder' => 'Lien n°1'
                ]
            ])
            ->add('summaryBouton1', TextType::class, [
                'required' => true,
                'label' => 'Saisissez le nom du bouton n°1',
                'attr' => [
                    'placeholder' => 'Bouton n°1'
                ]
            ])
            ->add('summaryText2', TextType::class, [
                'required' => true,
                'label' => 'Saisissez la punchline n°2',
                'attr' => [
                    'placeholder' => 'Saisissez la punchline n°2'
                ]
            ])
            ->add('summaryLien2', TextType::class, [
                'required' => true,
                'label' => 'Saisissez l\'adresse du lien n°2',
                'attr' => [
                    'placeholder' => 'Lien n°2'
                ]
            ])
            ->add('summaryBouton2', TextType::class, [
                'required' => true,
                'label' => 'Saisissez le nom du bouton n°2',
                'attr' => [
                    'placeholder' => 'Bouton n°2'
                ]
            ])
            ->add('imagePanoHead', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez l\'image du header ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('imagePanoPresentation', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez l\'image de présentation',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('imagePanoContact', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez l\'image du formulaire de contact ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('imagePanoInscription', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez l\'image du formulaire d\'inscription ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('imagePanoConnexion', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez l\'image du formulaire de connexion ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('imagePanoResultat', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez l\'image des résultats ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('presentationImage', FileType::class, [
                'required' => true,
                'label' => 'Ajoutez l\'image de l\'accueil',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('presentationText', TextareaType::class, [
                'required' => true,
                'label' => 'Saisissez le texte de présentation accueil',
                'attr' => [
                    'placeholder' => 'Saisissez le texte de présentation accueil'
                ]
            ])
            ->add('mentions', TextareaType::class, [
                'required' => true,
                'label' => 'Saisissez le texte des mentions légales',
                'attr' => [
                    'placeholder' => 'Saisissez le texte des mentions légales'
                ]
            ])
            ->add('presse', TextareaType::class, [
                'required' => true,
                'label' => 'Saisissez le texte de presse',
                'attr' => [
                    'placeholder' => 'Saisissez le texte de presse'
                ]
            ])
            ->add('presseDoc', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez un fichier de communiqué de presse ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Envoyer !"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contenu::class,
        ]);
    }
}
