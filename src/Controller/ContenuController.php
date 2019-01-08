<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContenuController extends AbstractController
{
    /**
     * @Route("/contenu", name="contenu")
     */
    public function index()
    {
        return $this->render('contenu/index.html.twig', [
            'controller_name' => 'ContenuController',
        ]);
    }
}
