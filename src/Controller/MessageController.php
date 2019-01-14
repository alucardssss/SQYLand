<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\MimeType\ExtensionGuesser;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/message")
 */
class MessageController extends AbstractController
{
    /**
     * @Route("/", name="message_index", methods={"GET"})
     */
    public function index(): Response
    {
        $messages = $this->getDoctrine()
            ->getRepository(Message::class)
            ->findAll();

        return $this->render('message/index.html.twig', [
            'messages' => $messages,
        ]);
    }

    /**
     * @Route("/new", name="message_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function new(Request $request, \Swift_Mailer $mailer )
    {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // récupération des données
            $message = $form->getData();

                if ($message->getFichier() !== null ) {
                    /**
                     * Le fichier envoyé est renommer avec un nom unique
                     *
                     * @var UploadedFile $file
                     * @var File  $file
                     */
                    $file = $message->getFichier();

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
                    $message->setFichier($fileName);

                } else {
                    $message->setFichier('404.jpg');
                }

            // enregistrement en bdd
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($message);
            $entityManager->flush();

            // envoi du mail
            $message = (new \Swift_Message($message->getSujet()))
                ->setFrom($message->getExpediteur())
                ->setTo('contact@sqyland.org')
                ->setBody(
                    $message->getTexte().'<br>'.$message->getListe(),
                    'text/html'
                )
            ;

            $mailer->send($message);

            # notification
            $this->addFlash('notice', 'Merci votre message est transmis à SQYLand !');

            return $this->redirectToRoute('message_index');
        }

        return $this->render('message/new.html.twig', [
            'message' => $message,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="message_show", methods={"GET"})
     */
    public function show(Message $message): Response
    {
        return $this->render('message/show.html.twig', [
            'message' => $message,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="message_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Message $message):Response
    {

        # On récupère l'image du message
        $file = $message->getFichier();

        /**
         * Notre formulaire attend une instance de File
         * pour l'edition de la file.
         */
        $message->setFichier(
            new File($this->getParameter('images_general')
                . '/' . $file)
        );

        $form = $this->createForm(MessageType::class, $message)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($message->getFichier() !== null ) {

                /**
                 * @var UploadedFile $file
                 * @var File $file
                 */
                $file = $message->getFichier();

                $fileName = $this->generateUniqueFileName()
                    . '.' . $file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('images_general'),
                        $fileName
                    );
                } catch (FileException $e) {
                    $this->addFlash('notice',
                        'Pas de fichier à affiché !');
                }

                # Mise à jour de l'image
                $message->setFichier($fileName);
            } else {
                $message->setFichier('404.jpg');
            }

            # Sauvegarde en BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();

            # Notification
            $this->addFlash('notice',
                'Félicitations, le message est modifié !');


            return $this->redirectToRoute('message_index', [
                'id' => $message->getId(),
            ]);
        }

        return $this->render('message/edit.html.twig', [
            'message' => $message,
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/{id}", name="message_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Message $message): Response
    {
        if ($this->isCsrfTokenValid('delete'.$message->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($message);
            $entityManager->flush();
        }

        return $this->redirectToRoute('message_index');
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
