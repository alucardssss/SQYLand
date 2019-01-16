<?php

namespace App\Controller;

use App\Entity\Contenu;
use App\Form\ContenuType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\MimeType\ExtensionGuesser;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class ContenuController extends AbstractController
{
    /**
     * @Route("/contenu/liste", name="contenu_index", methods={"GET"})
     */
    public function index(): Response
    {
        $contenus = $this->getDoctrine()
            ->getRepository(Contenu::class)
            ->findAll();

        return $this->render('contenu/index.html.twig', [
            'contenus' => $contenus,
        ]);
    }

    /**
     * @Route("/contenu/new", name="contenu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contenu = new Contenu();
        $form = $this->createForm(ContenuType::class, $contenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // récupération des données
            $contenu = $form->getData();

            if ($contenu->getImagePanoHead() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file1 = $contenu->getImagePanoHead();

                $fileName1 = $this->generateUniqueFileName()
                    . '.' . $file1->guessExtension();

                try {
                    $file1->move(
                        $this->getParameter('images_general'),
                        $fileName1
                    );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                $contenu->setImagePanoHead($fileName1);

            }
             if ($contenu->getImagePanoPresentation() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file2 = $contenu->getImagePanoPresentation();

                $fileName2 = $this->generateUniqueFileName()
                     . '.' . $file2->guessExtension();


                try {
                     $file2->move(
                         $this->getParameter('images_general'),
                         $fileName2
                     );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                 $contenu->setImagePanoPresentation($fileName2);
            }

             if ($contenu->getImagePanoInscription() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                 $file3 = $contenu->getImagePanoInscription();

                 $fileName3 = $this->generateUniqueFileName()
                     . '.' . $file3->guessExtension();

                 try {
                     $file3->move(
                         $this->getParameter('images_general'),
                         $fileName3
                     );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                 $contenu->setImagePanoInscription($fileName3);
            }

             if ($contenu->getImagePanoContact() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                 $file4 = $contenu->getImagePanoContact();

                 $fileName4 = $this->generateUniqueFileName()
                     . '.' . $file4->guessExtension();

                 try {
                     $file4->move(
                         $this->getParameter('images_general'),
                         $fileName4
                     );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                 $contenu->setImagePanoContact($fileName4);
            }

             if ($contenu->getImagePanoConnexion() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                 $file5 = $contenu->getImagePanoConnexion();

                 $fileName5 = $this->generateUniqueFileName()
                     . '.' . $file5->guessExtension();

                 try {
                     $file5->move(
                         $this->getParameter('images_general'),
                         $fileName5
                     );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                 $contenu->setImagePanoConnexion($fileName5);
            }

             if ($contenu->getImagePanoResultat() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                 $file6 = $contenu->getImagePanoResultat();

                 $fileName6 = $this->generateUniqueFileName()
                     . '.' . $file6->guessExtension();

                 try {
                     $file6->move(
                         $this->getParameter('images_general'),
                         $fileName6
                     );

                 } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                 $contenu->setImagePanoResultat($fileName6);
            }

             if ($contenu->getPresentationImage() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                 $file7 = $contenu->getPresentationImage();

                 $fileName7 = $this->generateUniqueFileName()
                     . '.' . $file7->guessExtension();

                 try {
                     $file7->move(
                         $this->getParameter('images_general'),
                         $fileName7
                     );

                 } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                 $contenu->setPresentationImage($fileName7);
            }

             if ($contenu->getPresseDoc() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                 $file8 = $contenu->getPresseDoc();

                 $fileName8 = $this->generateUniqueFileName()
                     . '.' . $file8->guessExtension();

                 try {
                     $file8->move(
                         $this->getParameter('images_general'),
                         $fileName8
                     );

                 } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                 $contenu->setPresseDoc($fileName8);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contenu);
            $entityManager->flush();

            # notification
            $this->addFlash('notice', 'Le contenu est intégré !');

             return $this->redirectToRoute('contenu_index');
        }

        return $this->render('contenu/new.html.twig', [
            'contenu' => $contenu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="contenu_show")
     */
    public function show(): Response
    {
        $contenu = $this->getDoctrine()
            ->getRepository(Contenu::class)->find('1');

        return $this->render('contenu/show.html.twig', [
            'contenu' => $contenu,
        ]);

    }

    /**
     * @Route("/mentions", name="contenu_mentions")
     */
    public function mentions(): Response
    {
        $contenu = $this->getDoctrine()
            ->getRepository(Contenu::class)->find('1');

        return $this->render('contenu/mentions.html.twig', [
            'contenu' => $contenu,
        ]);

    }

    /**
     * @Route("/presse", name="contenu_presse")
     */
    public function presse(): Response
    {
        $contenu = $this->getDoctrine()
            ->getRepository(Contenu::class)->find('1');

        return $this->render('contenu/presse.html.twig', [
            'contenu' => $contenu,
        ]);

    }

    /**
     * @Route("/contenu/{id}/edit", name="contenu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contenu $contenu): Response
    {

        # On récupère les images du contenu
        $file1 = $contenu->getImagePanoHead();
        $file2 = $contenu->getImagePanoPresentation();
        $file3 = $contenu->getImagePanoInscription();
        $file4 = $contenu->getImagePanoContact();
        $file5 = $contenu->getImagePanoConnexion();
        $file6 = $contenu->getImagePanoResultat();
        $file7 = $contenu->getPresentationImage();
        $file8 = $contenu->getPresseDoc();

        /**
         * Notre formulaire attend une instance de File pour l'édition
         */
        $contenu->setImagePanoHead(
            new File($this->getParameter('images_general')
                . '/' . $file1)
        );

        $contenu->setImagePanoPresentation(
            new File($this->getParameter('images_general')
                . '/' . $file2)
        );

        $contenu->setImagePanoInscription(
            new File($this->getParameter('images_general')
                . '/' . $file3)
        );

        $contenu->setImagePanoContact(
            new File($this->getParameter('images_general')
                . '/' . $file4)
        );

        $contenu->setImagePanoConnexion(
            new File($this->getParameter('images_general')
                . '/' . $file5)
        );

        $contenu->setImagePanoResultat(
            new File($this->getParameter('images_general')
                . '/' . $file6)
        );

        $contenu->setPresentationImage(
            new File($this->getParameter('images_general')
                . '/' . $file7)
        );

        $contenu->setPresseDoc(
            new File($this->getParameter('images_general')
                . '/' . $file8)
        );


        $form = $this->createForm(ContenuType::class, $contenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            // récupération des données
            $contenu = $form->getData();

            if ($contenu->getImagePanoHead() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file1 = $contenu->getImagePanoHead();

                $fileName1 = $this->generateUniqueFileName()
                    . '.' . $file1->guessExtension();

                try {
                    $file1->move(
                        $this->getParameter('images_general'),
                        $fileName1
                    );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                $contenu->setImagePanoHead($fileName1);

            }
            if ($contenu->getImagePanoPresentation() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file2 = $contenu->getImagePanoPresentation();

                $fileName2 = $this->generateUniqueFileName()
                    . '.' . $file2->guessExtension();


                try {
                    $file2->move(
                        $this->getParameter('images_general'),
                        $fileName2
                    );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $contenu->setImagePanoPresentation($fileName2);
            }

            if ($contenu->getImagePanoInscription() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file3 = $contenu->getImagePanoInscription();

                $fileName3 = $this->generateUniqueFileName()
                    . '.' . $file3->guessExtension();

                try {
                    $file3->move(
                        $this->getParameter('images_general'),
                        $fileName3
                    );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $contenu->setImagePanoInscription($fileName3);
            }

            if ($contenu->getImagePanoContact() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file4 = $contenu->getImagePanoContact();

                $fileName4 = $this->generateUniqueFileName()
                    . '.' . $file4->guessExtension();

                try {
                    $file4->move(
                        $this->getParameter('images_general'),
                        $fileName4
                    );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $contenu->setImagePanoContact($fileName4);
            }

            if ($contenu->getImagePanoConnexion() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file5 = $contenu->getImagePanoConnexion();

                $fileName5 = $this->generateUniqueFileName()
                    . '.' . $file5->guessExtension();

                try {
                    $file5->move(
                        $this->getParameter('images_general'),
                        $fileName5
                    );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $contenu->setImagePanoConnexion($fileName5);
            }

            if ($contenu->getImagePanoResultat() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file6 = $contenu->getImagePanoResultat();

                $fileName6 = $this->generateUniqueFileName()
                    . '.' . $file6->guessExtension();

                try {
                    $file6->move(
                        $this->getParameter('images_general'),
                        $fileName6
                    );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $contenu->setImagePanoResultat($fileName6);
            }

            if ($contenu->getPresentationImage() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file7 = $contenu->getPresentationImage();

                $fileName7 = $this->generateUniqueFileName()
                    . '.' . $file7->guessExtension();

                try {
                    $file7->move(
                        $this->getParameter('images_general'),
                        $fileName7
                    );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $contenu->setPresentationImage($fileName7);
            }

            if ($contenu->getPresseDoc() !== null) {
                /**
                 * Le fichier envoyé est renommer avec un nom unique
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file8 = $contenu->getPresseDoc();

                $fileName8 = $this->generateUniqueFileName()
                    . '.' . $file8->guessExtension();

                try {
                    $file8->move(
                        $this->getParameter('images_general'),
                        $fileName8
                    );

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $contenu->setPresseDoc($fileName8);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contenu);
            $entityManager->flush();

            # notification
            $this->addFlash('notice', 'Le contenu est intégré !');

            return $this->redirectToRoute('contenu_index', [
                'id' => $contenu->getId(),
            ]);
        }

        return $this->render('contenu/edit.html.twig', [
            'contenu' => $contenu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/contenu/{id}", name="contenu_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contenu $contenu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contenu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contenu_index');
    }


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



