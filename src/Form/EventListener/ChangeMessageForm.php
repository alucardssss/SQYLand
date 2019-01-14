<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13/01/2019
 * Time: 12:07
 */

namespace App\Form\EventListener;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;

class ChangeMessageForm implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        // Tells the dispatcher that you want to listen on the form.pre_set_data
        // event and that the preSetData method should be called.
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event)
    {
        $message = $event->getData();
        $form = $event->getForm();

        // checks if the message sujet is "abus"
        // If no data is passed to the form, the data is "null".
        // This should be considered a new "Product"
        if ("Signalement Abus" === $message->getSujet()) {
            $form->add('name', TextType::class);
        }
    }
}