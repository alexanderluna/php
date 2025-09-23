<?php

namespace App\Controller;

use App\Model\Product;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductApiController extends AbstractController
{
    #[Route('/api/products')]
    public function getCollection(LoggerInterface $logger): Response
    {
        $logger->info('This is our beer inventory');
        $products = [
            new Product(
                id: 1, 
                name: 'moon beer', 
                description: 'the best moon beer', 
                price: 15
            ),
            new Product(
                id: 2, 
                name: 'lager beer', 
                description: 'low temperature beer', 
                price: 20
            ),
            new Product(
                id: 3, 
                name:'pilsner', 
                description:'pale lager beer',
                price: 17.5
            ),
        ];

        return $this->json($products);
    }
}