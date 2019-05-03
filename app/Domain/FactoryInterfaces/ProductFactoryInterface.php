<?php

namespace App\Domain\FactoryInterfaces;

use App\Product;

/**
 * Interface ProductFactoryInterface
 */
interface ProductFactoryInterface
{
    /**
     * @param string $name
     * @param int $quantity
     * @param int $price
     * @param int $categoryId
     * @param string|null $description
     *
     * @return Product
     */
    public function create(
        string $name,
        int $quantity,
        int $price,
        int $categoryId,
        string $description = null
    ) : Product;
}
