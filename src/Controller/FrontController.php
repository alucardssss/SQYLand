<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front")
     */
    public function index()
    {
        return $this->render('front/accueil.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }


    /**
     * @Route("/admin/{slug<[a-zA-Z0-9\-_\/]+>}",
     *     methods={"GET"}, name="admin")
     * @return Response
     */
    public function admin()
    {
        return $this->redirectToRoute('front' , [] ,
            Response::HTTP_MOVED_PERMANENTLY);
    }

    /**
     * Page d'admin connexion
     * @Route("/admin/connect/")
     * @return Response
     */
    public function adminConnexion()
    {
        return new Response("<html><body><h1>ADMIN connexion</h1></body></html>");
        return $this->render('admin/connexionAdmin.html.twig');
    }

    /**
     * Page d'admin membre
     * @Route("/admin/membre/")
     * @return Response
     */
    public function adminMembre()
    {
        return new Response("<html><body><h1>ADMIN membre</h1></body></html>");
        return $this->render('admin/validationProfil.html.twig');
    }

    /**
     * Page d'admin contact
     * @Route("/admin/contact/")
     * @return Response
     */
    public function adminContact()
    {
        return new Response("<html><body><h1>ADMIN contact</h1></body></html>");
        return $this->render('admin/email.html.twig');
    }



    /**
     * Page de Contact
     * @Route("/contact/")
     * @return Response
     */
    public function contact()
    {

        return new Response("<html><body><h1>PAGE DE CONTACT</h1></body></html>");
        return $this->render('formulaire/contact.html.twig');
    }

    /**
     * Page de resultat
     * @Route("/recherche")
     * @return Response
     */
    public function result()
    {

        return new Response("<html><body><h1>PAGE DE resultat</h1></body></html>");
        return $this->render('base.html.twig');
    }

    /**
     * Page de mentions legales
     * @Route("/mentions/")
     * @return Response
     */
    public function mentions()
    {
        return new Response("<html><body><h1>PAGE DE mentions legales</h1></body></html>");
        return $this->render('front/mentions.html.twig');
    }

    /**
     * Page de presse
     * @Route("/presse/")
     * @return Response
     */
    public function presse()
    {
        return new Response("<html><body><h1>PAGE DE presse</h1></body></html>");
        return $this->render('front/presse.html.twig');
    }

   /**
     * Page de connexion
     * @Route("/connexion/")
     * @return Response
     */
    public function connexion()
    {
        return new Response("<html><body><h1>PAGE DE connexion</h1></body></html>");
        return $this->render('formulaire/connexion.html.twig');
    }

    /**
     * Page d'inscription
     * @Route("/membre/inscription/")
     * @return Response
     */
    public function inscription()
    {
        return new Response("<html><body><h1>page d'inscription</h1></body></html>");
        return $this->render('formulaire/inscription.html.twig');
    }


    /**
     * @Route("/{slug<[a-zA-Z0-9\-_\/]+>}",
     *     methods={"GET"}, name="autre")
     * @return Response
     */
    public function autreChemin()
    {
        return new Response("<html><body><h1>PAGE de la categorie</h1></body></html>");
        return $this->render('base.html.twig');
    }

}
