<?php

namespace App\Infrastructure\Factories;

use App\Domain\FactoryInterfaces\ProductFactoryInterface;
use App\Product;

/**
 * Class ProductFactory
 */
class ProductFactory implements ProductFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(
        string $name,
        int $quantity,
        int $price,
        int $categoryId,
        string $description = null
    ) : Product {
        return (new Product())
            ->setName($name)
            ->setQuantity($quantity)
            ->setCategoryId($categoryId)
            ->setPrice($price);
    }
}
