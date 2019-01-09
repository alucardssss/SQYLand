<?php

namespace App\Controller;

use App\Entity\artiste;
use App\Form\InscriptionFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ArtisteController extends AbstractController
{
    /**
     * Inscriptions d'un artiste
     * @Route("/inscription/artiste", name="artiste_inscription")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function inscription(Request $request)

    {
        //creation dun artiste

        $Artiste = new artiste();


        //creation du formulaire artiste-ormType

        $form = $this->createForm(InscriptionFormType::class, $Artiste)
            ->handleRequest($request);


        #si le Formulaire soumis et valide

        if($form->isSubmitted()&& $form->isValid())
        {

            # Encodage du mot de passe


            // Sauvergarde en BDD
           $save = $this->getDoctrine()->getManager();
           $save->persist($Artiste);
           $save->flush();

            #Notification

            $this->addFlash('notice',
                'felicitations vous pouvez vous connecter');

            # Redirection

            return $this->redirectToRoute('/connexion/');
        }


        //affichage dans la vue

        return $this->render("formulaire/inscription.html.twig", [
            'form'  => $form->createView()
        ]);
    }
}
