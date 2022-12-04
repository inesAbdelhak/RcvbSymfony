<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccesBddController extends AbstractController
{
    #[Route('/acces/bdd', name: 'app_acces_bdd')]
    public function index(): Response
    {
        return $this->render('acces_bdd/index.html.twig', [
            'controller_name' => 'AccesBddController',
        ]);
    }
}
