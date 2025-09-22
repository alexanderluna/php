<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('<h2>Hello World</h2>');
    }
}
