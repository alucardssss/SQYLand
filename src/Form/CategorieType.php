<?php

namespace App\Form;

use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class, [
                'label' => 'Saisissez le code de la catégorie',
                'attr' => [
                    'placeholder' => 'exemple 2-0004'
                ]
            ])
            ->add('famille', TextType::class, [
                'label' => 'Saisissez la famille de la catégorie',
                'attr' => [
                    'placeholder' => 'exemple sculpture ou danse'
                ]
            ])
            ->add('nom', TextType::class, [
                'label' => 'Saisissez le Nom de la catégorie',
                'attr' => [
                    'placeholder' => 'exemple Arts de rue'
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
            'data_class' => Categorie::class,
        ]);
    }
}
