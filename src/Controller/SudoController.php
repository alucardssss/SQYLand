<?php

namespace App\Controller;

use App\Entity\Sudo;
use App\Form\SudoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class SudoController extends AbstractController
{

    /**
     * @Route("/", name="admin")
     */
    public function admin(Request $request)
    {
        $form = $this->createForm(SudoType::class);
        $form->handleRequest($request);
       return $this->render('sudo/connexion.html.twig', [
           'form' => $form->createView(),
       ]);
    }


    /**
     * @Route("/liste", name="sudo_index", methods={"GET"})
     */
    public function index(): Response
    {
        $sudos = $this->getDoctrine()
            ->getRepository(Sudo::class)
            ->findAll();

        return $this->render('sudo/index.html.twig', [
            'sudos' => $sudos,
        ]);
    }

    /**
     * @Route("/new", name="sudo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sudo = new Sudo();
        $form = $this->createForm(SudoType::class, $sudo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sudo);
            $entityManager->flush();

            return $this->redirectToRoute('sudo_index');
        }

        return $this->render('sudo/new.html.twig', [
            'sudo' => $sudo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sudo_show", methods={"GET"})
     */
    public function show(Sudo $sudo): Response
    {
        return $this->render('sudo/show.html.twig', [
            'sudo' => $sudo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sudo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sudo $sudo): Response
    {
        $form = $this->createForm(SudoType::class, $sudo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sudo_index', [
                'id' => $sudo->getId(),
            ]);
        }

        return $this->render('sudo/edit.html.twig', [
            'sudo' => $sudo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sudo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sudo $sudo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sudo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sudo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sudo_index');
    }
}
