<?php

namespace App\Controller;


use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * connexion dun membre
     * @Route("/login", name="security_connexion")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function connexion(AuthenticationUtils $authenticationUtils)
    {
        $form = $this->createForm(LoginType::class,[
            'email' => $authenticationUtils->getLastUsername()
        ]);

        $error =  $authenticationUtils->getLastAuthenticationError();

        return $this->render('security/login.html.twig',[
            'form' => $form->createView(),
            'error' => $error
        ]);
    }


    /**
     * deconnexion dun membre
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout()
    {

    }
}