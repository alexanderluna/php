<?php

namespace App\Model;

class Product
{
    public function __construct(
        private int $id,
        private ProductStatusEnum $status,
        private string $name,
        private string $description,
        private float $price,
    ) {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): ProductStatusEnum
    {
        return $this->status;
    }

    public function getStatusString(): string
    {
        return $this->status->value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}