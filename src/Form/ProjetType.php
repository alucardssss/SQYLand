<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Projet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => true,
                'label' => "Titre de votre projet",
                'attr' => [
                    'placeholder' => "Nom du projet"
                ]
            ] )
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'required' => true,
                'expanded' => false,
                'multiple' => false,
                'label' => "Catégorie de votre projet"
            ])
            ->add('resume', TextareaType::class, [
                'required' => true,
                'label' => 'Résumé du projet',
                'attr' => [
                    'placeholder' => 'Saisissez le decriptif'
                ]
            ])
            ->add('imageProfil', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez une image de profil ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('imageLogo1', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez un logo sponsor ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('imageLogo2', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez un logo sponsor ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('imageLogo3', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez un logo sponsor ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('image1', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez une photo d\'illustration ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('image2', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez une photo d\'illustration ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('image3', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez une photo d\'illustration ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('lienFacebook', UrlType::class, [
                'required' => false,
                'label' => "Lien vers votre profil Facebook",
                'attr' => [
                    'placeholder' => "lien Facebook"
                ]
            ] )
            ->add('lienTwitter', UrlType::class, [
                'required' => false,
                'label' => "Lien vers votre profil Twitter",
                'attr' => [
                    'placeholder' => "lien Twitter"
                ]
            ] )
            ->add('lienYoutube', UrlType::class, [
                'required' => false,
                'label' => "Lien vers votre profil Youtube",
                'attr' => [
                    'placeholder' => "lien Youtube"
                ]
            ] )
            ->add('lienSoundcloud', UrlType::class, [
                'required' => false,
                'label' => "Lien vers votre profil Soundcloud",
                'attr' => [
                    'placeholder' => "lien Souncloud"
                ]
            ] )
            ->add('lienLinkedin', UrlType::class, [
                'required' => false,
                'label' => "Lien vers votre profil Linkedin",
                'attr' => [
                    'placeholder' => "lien Linkedin"
                ]
            ] )
            ->add('lienPerso', UrlType::class, [
                'required' => false,
                'label' => "Lien vers votre site internet",
                'attr' => [
                    'placeholder' => "lien site internet"
                ]
            ] )
            ->add('iframeSon1', TextType::class, [
                'required' => false,
                'label' => "Lien vers un son à présenter",
                'attr' => [
                    'placeholder' => "lien son n°1 "
                ]
            ] )
            ->add('iframeSon2', TextType::class, [
                'required' => false,
                'label' => "Lien vers un son à présenter",
                'attr' => [
                    'placeholder' => "lien son n°2 "
                ]
            ] )
            ->add('iframeSon3', TextType::class, [
                'required' => false,
                'label' => "Lien vers un son à présenter",
                'attr' => [
                    'placeholder' => "lien son n°3 "
                ]
            ] )
            ->add('iframeVideo1', TextType::class, [
                'required' => false,
                'label' => "Lien vers une vidéo à présenter",
                'attr' => [
                    'placeholder' => "lien vidéo n°1 "
                ]
            ] )
            ->add('iframeVideo2', TextType::class, [
                'required' => false,
                'label' => "Lien vers un son à présenter",
                'attr' => [
                    'placeholder' => "lien vidéo n°2 "
                ]
            ] )
            ->add('iframeVideo3', TextType::class, [
                'required' => false,
                'label' => "Lien vers un son à présenter",
                'attr' => [
                    'placeholder' => "lien vidéo n°3 "
                ]
            ] )
            ->add('submit', SubmitType::class, [

                'label' => "c'est parti !",
                'attr' => [
                    'placeholder' => "c'est parti !"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
