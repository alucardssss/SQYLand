<?php

namespace App\Form;

use App\Entity\Projet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('resume')
            ->add('imageProfil')
            ->add('imageLogo1')
            ->add('imageLogo2')
            ->add('imageLogo3')
            ->add('image1')
            ->add('image2')
            ->add('image3')
            ->add('lienFacebook')
            ->add('lienTwitter')
            ->add('lienYoutube')
            ->add('lienSoundcloud')
            ->add('lienLinkedin')
            ->add('lienPerso')
            ->add('iframeSon1')
            ->add('iframeSon2')
            ->add('iframeSon3')
            ->add('iframeVideo1')
            ->add('iframeVideo2')
            ->add('iframeVideo3')
            ->add('categorie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
