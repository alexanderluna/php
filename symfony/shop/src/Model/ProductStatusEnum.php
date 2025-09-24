<?php

namespace App\Model;

enum ProductStatusEnum: string
{
    case IN_STOCK = 'In Stock';
    case LOW_STOCK = 'Low Stock';
    case OUT_OF_STOCK = 'Sold Out';
}