<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Entity\Categorie;
use App\Entity\Projet;
use App\Form\ArtisteType;
use App\Form\InscriptionFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\MimeType\ExtensionGuesser;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
     * @Route("/inscription", name="artiste_inscription", methods={"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function inscription(Request $request, \Swift_Mailer $mailer,
                                UserPasswordEncoderInterface $encoder)

    {
        //creation dun artiste
        $Artiste = new artiste();

        //creation du formulaire artiste-ormType
        $form = $this->createForm(ArtisteType::class, $Artiste);
        $form->handleRequest($request);


        #si le Formulaire soumis et valide

        if ($form->isSubmitted() && $form->isValid()) {

            # Encodage du mot de passe
            $hash = $encoder->encodePassword($Artiste, $Artiste->getMdp());
            $Artiste->setMdp($hash);

            // récupération des données
            $Artiste = $form->getData();

            if ($Artiste->getImage() !== null ) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 *
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file = $Artiste->getImage();

                $fileName = $this->generateUniqueFileName()
                    . '.' . $file->guessExtension();

                // enregistrement dans le dossier
                try {
                    $file->move(
                        $this->getParameter('images_general'),
                        $fileName
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'message' property to store the file name
                // instead of its contents
                $Artiste->setImage($fileName);

            } else {
                $Artiste->setImage('404.jpg');
            }

            // Sauvergarde en BDD
            $saves = $this->getDoctrine()->getManager();
            $saves->persist($Artiste);
            $saves->flush();

            // envoi du mail de confirmation à l'utilisateur
            $Artiste1 = (new \Swift_Message('Confirmation de votre inscription chez SQYLand.org'))
                ->setFrom('contact@sqyland.org')
                ->setTo($Artiste->getEmail())
                ->setBody(
                    $this->renderView(
                        'emails/registration.html.twig'),
                    'text/html'
                )
            ;

            $mailer->send($Artiste1);

            // envoi du mail d'avertissement admin
            $Artiste2 = (new \Swift_Message('Inscription nouvel artiste'))
                ->setFrom($Artiste->getEmail())
                ->setTo('contact@sqyland.org')
                ->setBody(
                    $this->renderView(
                        'emails/message.html.twig',
                        ['contenu' => $Artiste->getTexte().'<br>'.$Artiste->getListe()]
                    ),
                    'text/html'
                )
            ;

            $mailer->send($Artiste2);

            #Notification
            $this->addFlash('notice',
                'felicitations vous pouvez vous connecter');

            # Redirection

            return $this->redirectToRoute('app_login');
        }


        //affichage dans la vue

        return $this->render("artiste/new.html.twig", [
            'artiste' => $Artiste,
            'form' => $form->createView()

        ]);

    }


   /**
    * @Route("/{id}", name="artiste_show", methods={"GET"})
    */
   public function show(Artiste $Artiste, Categorie $categorie, Projet $projet): Response
   {
      return $this->render('artiste/show.html.twig', [
           'artiste' => $Artiste,
          'categorie' => $categorie,
          'projet' => $projet
       ]);
   }

   /**
    * @Route("/{id}/edit", name="artiste_edit", methods={"GET","POST"})
    */
   public function edit(Request $request, Artiste $Artiste,
                        UserPasswordEncoderInterface $encoder): Response
   {

       # On récupère l'image du message
       $file = $Artiste->getImage();

       /**
        * Notre formulaire attend une instance de File
        * pour l'edition de la file.
        */
       $Artiste->setImage(
           new File($this->getParameter('images_general')
               . '/' . $file)
       );

       $form = $this->createForm(ArtisteType::class, $Artiste)
           ->handleRequest($request);

       # Encodage du mot de passe
       $hash = $encoder->encodePassword($Artiste, $Artiste->getMdp());
       $Artiste->setMdp($hash);

       if ($form->isSubmitted() && $form->isValid()) {

           if ($Artiste->getImage() !== null) {
               /**
                * Le fichier envoyé est renommer avec un nom unique
                *
                * @var UploadedFile $file
                * @var File $file
                */
               $file = $Artiste->getImage();

               $fileName = $this->generateUniqueFileName()
                   . '.' . $file->guessExtension();

               // enregistrement dans le dossier
               try {
                   $file->move(
                       $this->getParameter('images_general'),
                       $fileName
                   );
               } catch (FileException $e) {
                   // ... handle exception if something happens during file upload
               }

               // updates the 'message' property to store the file name
               // instead of its contents
               $Artiste->setImage($fileName);

           } else {
               $Artiste->setImage('404.jpg');
           }

           // Sauvergarde en BDD
           $saves = $this->getDoctrine()->getManager();
           $saves->persist($Artiste);
           $saves->flush();

           #Notification
           $this->addFlash('notice',
               'Votre profil est modifié');

           return $this->redirectToRoute('artiste_index', [
               'id' => $Artiste->getId(),
           ]);
       }
       return $this->render('artiste/edit.html.twig', [
           'artiste' => $Artiste,
           'form' => $form->createView(),
       ]);
   }

   /**
    * @Route("/{id}", name="artiste_delete", methods={"DELETE"})
    */
   public function delete(Request $request, Artiste $Artiste): Response
   {
       if ($this->isCsrfTokenValid('delete'.$Artiste->getId(), $request->request->get('_token'))) {
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->remove($Artiste);
           $entityManager->flush();
       }

       return $this->redirectToRoute('artiste_index');
   }


    /**
     * @Route("/", name="artiste_index", methods={"GET"})
     */
    public function index(): Response
    {
        $Artiste = $this->getDoctrine()
            ->getRepository(Artiste::class)
            ->findAll();

        return $this->render('artiste/index.html.twig', [
            'artistes' => $Artiste,
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

    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    /**
     * Returns the extension based on the mime type.
     *
     * If the mime type is unknown, returns null.
     *
     * This method uses the mime type as guessed by getMimeType()
     * to guess the file extension.
     *
     * @return string|null The guessed extension or null if it cannot be guessed
     *
     * @see ExtensionGuesser
     * @see getMimeType()
     */
    public function guessExtension()
    {
        $type = $this->getMimeType();
        $guesser = ExtensionGuesser::getInstance();

        return $guesser->guess($type);
    }


}
