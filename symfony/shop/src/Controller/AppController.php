<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppController extends AbstractController
{
    #[Route('/')]
    public function home(): Response
    {
        $year = 2025;
        return $this->render('app/home.html.twig', parameters: [
            'year' => $year
        ]);
    }
}
