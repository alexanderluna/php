<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppController extends AbstractController
{
    #[Route('/')]
    public function home(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        $product = $products[array_rand(array: $products)];

        return $this->render(view: 'app/home.html.twig', parameters: [
            'products' => $products,
            'product' => $product,
        ]);
    }
}
