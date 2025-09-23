<?php

namespace App\Controller;

use App\Model\Product;
use App\Repository\ProductRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/products')]
class ProductApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->json($products);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Product not found');
        }
        
        return $this->json($product);
    }
}