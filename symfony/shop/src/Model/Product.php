<?php

namespace App\Model;

class Product
{
    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private float $price,
    ) {

    }

    function getId(): int
    {
        return $this->id;
    }

    function getName(): string
    {
        return $this->name;
    }

    function getDescription(): string
    {
        return $this->description;
    }

    function getPrice(): float
    {
        return $this->price;
    }
}