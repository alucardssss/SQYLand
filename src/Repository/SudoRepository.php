<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15/01/2019
 * Time: 09:14
 */

namespace App\Repository;

use App\Entity\Sudo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SudoRepository extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('mdp')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sudo::class,
        ]);
    }
}
{

}

