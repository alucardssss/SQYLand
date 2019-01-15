<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('expediteur', EmailType::class, [
                'required' => true,
                'label' => "Email",
                'attr' => [
                    'placeholder' => "Veuillez saisir votre Email"
                ]
            ])
            ->add('sujet', ChoiceType::class, [
                'required' => true,
                'choices'  => array(
                    'Contacter un artiste' => 'Contact Artistes',
                    'Envoyer un appel à projets' => 'Appel à projets',
                    'Laisser un commentaire' => 'Un commentaire',
                    'Signaler un abus' => 'Signalement Abus',
                    'Contacter l\'association' => 'Demande SqyLand',
                    )
            ])
            ->add('texte', TextareaType::class, [
                'required' => true,
                'label' => 'Message',
                'attr' => [
                    'placeholder' => 'Saisissez votre Message'
                ]
            ])
            ->add('liste', TextType::class, [
                'required' => false,
                'label' => 'Liste des artistes',
                'attr' => [
                    'placeholder' => 'Les artistes à contacter'
                ]
            ])
            ->add('fichier', FileType::class, [
                'required' => false,
                'label' => 'Ajoutez votre fichier ',
                'attr' => [
                    'class' => 'dropify',
                ]
            ])
            ->add('nouveau',CheckboxType::class, [
                'required' => false,
                'label' => "Nouveau message",
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'oui',
                    'data-off' => 'non',
                ]
             ])
            ->add('enCours',CheckboxType::class, [
                'required' => false,
                'label' => "Message en cours",
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'oui',
                    'data-off' => 'non',
                ]
            ])
            ->add('termine',CheckboxType::class, [
                'required' => false,
                'label' => "Message terminé",
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'oui',
                    'data-off' => 'non'
                ]
            ])
            ->add('archive',CheckboxType::class, [
                'required' => false,
                'label' => "Message archivé",
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'oui',
                    'data-off' => 'non'
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
            'data_class' => Message::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'form';
    }


}
