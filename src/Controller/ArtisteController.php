<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Entity\Categorie;
use App\Entity\Projet;
use App\Form\ArtisteType;
use App\Form\InscriptionFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/**
 * @Route("/artiste")
 */
class ArtisteController extends AbstractController
{
    /**
     * Inscriptions d'un artiste
     * @Route("/inscription", name="artiste_inscription")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function inscription(Request $request,
                                UserPasswordEncoderInterface $encoder)

    {
        //creation dun artiste

        $Artiste = new artiste();


        //creation du formulaire artiste-ormType

        $form = $this->createForm(ArtisteType::class, $Artiste)
            ->handleRequest($request);


        #si le Formulaire soumis et valide

        if ($form->isSubmitted() && $form->isValid()) {

            # Encodage du mot de passe


            $hash = $encoder->encodePassword($Artiste, $Artiste->getMdp());


            $Artiste->setMdp($hash);

            // Sauvergarde en BDD
            $saves = $this->getDoctrine()->getManager();
            $saves->persist($Artiste);
            $saves->flush();

            #Notification

            $this->addFlash('notice',
                'felicitations vous pouvez vous connecter');

            # Redirection

            return $this->redirectToRoute('app_login');
        }


        //affichage dans la vue

        return $this->render("artiste/new.html.twig", [
            'form' => $form->createView()

        ]);

    }

  #  /**
  #   * @Route("/connexion" , name="security_connexion")
  #   * @return \Symfony\Component\HttpFoundation\Response
  #   */
  #  public function login()
  #  {
  #      return $this->render('formulaire/connexion.html.twig');
  #  }


   /**
    * @Route("/{id}", name="artiste_show", methods={"GET"})
    */
   public function show(Artiste $artiste, Categorie $categorie, Projet $projet): Response
   {
      return $this->render('artiste/show.html.twig', [
           'artiste' => $artiste,
          'categorie' => $categorie,
          'projet' => $projet
       ]);
   }

   /**
    * @Route("/{id}/edit", name="artiste_edit", methods={"GET","POST"})
    */
   public function edit(Request $request, Artiste $artiste): Response
   {
       $form = $this->createForm(ArtisteType::class, $artiste);
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
           $this->getDoctrine()->getManager()->flush();

           return $this->redirectToRoute('artiste_index', [
               'id' => $artiste->getId(),
           ]);
       }

       return $this->render('artiste/edit.html.twig', [
           'artiste' => $artiste,
           'form' => $form->createView(),
       ]);
   }

   /**
    * @Route("/{id}", name="artiste_delete", methods={"DELETE"})
    */
   public function delete(Request $request, Artiste $artiste): Response
   {
       if ($this->isCsrfTokenValid('delete'.$artiste->getId(), $request->request->get('_token'))) {
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->remove($artiste);
           $entityManager->flush();
       }

       return $this->redirectToRoute('artiste_index');
   }


    /**
     * @Route("/", name="artiste_index", methods={"GET"})
     */
    public function index(): Response
    {
        $artistes = $this->getDoctrine()
            ->getRepository(Artiste::class)
            ->findAll();

        return $this->render('artiste/index.html.twig', [
            'artistes' => $artistes,
        ]);
    }

  #  /**
  #   * @Route("/new", name="artiste_new", methods={"GET","POST"})
  #   */
  #  public function new(Request $request): Response
  #  {
  #      $artiste = new Artiste();
  #      $form = $this->createForm(ArtisteType::class, $artiste);
  #      $form->handleRequest($request);
#
  #      if ($form->isSubmitted() && $form->isValid()) {
  #          $entityManager = $this->getDoctrine()->getManager();
  #          $entityManager->persist($artiste);
  #          $entityManager->flush();
#
   #         return $this->redirectToRoute('artiste_index');
  #      }
#
 #       return $this->render('artiste/new.html.twig', [
  #          'artiste' => $artiste,
  #          'form' => $form->createView(),
  #      ]);
  #  }
}
