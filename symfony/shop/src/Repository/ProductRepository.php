<?php

namespace App\Repository;

use App\Model\Product;
use Psr\Log\LoggerInterface;

class ProductRepository
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function findAll(): array
    {
        $this->logger->info(message: 'This is our beer inventory');

        return [
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
    }

    public function find(int $id): ?Product
    {
        foreach($this->findAll() as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }

        return null;
    }
}