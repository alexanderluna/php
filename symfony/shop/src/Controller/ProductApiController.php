<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductApiController extends AbstractController
{
    #[Route('/api/products')]
    public function getCollection(): Response
    {
        $products = [
            [
                'name' => 'moon beer',
                'price' => 15
            ],
            [
                'name'=> 'lager beer',
                'price'=> 20
            ],
            [
                'name'=> 'pils',
                'price'=> 17.5
            ],
        ];

        return $this->json($products);
    }
}