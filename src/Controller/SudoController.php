<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SudoController extends AbstractController
{
    /**
     * @Route("/sudo", name="sudo")
     */
    public function index()
    {
        return $this->render('sudo/index.html.twig', [
            'controller_name' => 'SudoController',
        ]);
    }
}
