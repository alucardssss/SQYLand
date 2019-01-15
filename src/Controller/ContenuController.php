<?php

namespace App\Controller;

use App\Entity\Contenu;
use App\Form\ContenuType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contenu);
            $entityManager->flush();

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
        $form = $this->createForm(ContenuType::class, $contenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

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



}



