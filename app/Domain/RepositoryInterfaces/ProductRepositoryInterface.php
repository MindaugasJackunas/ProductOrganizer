<?php

namespace App\Domain\RepositoryInterfaces;

use App\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface ProductRepositoryInterface
 */
interface ProductRepositoryInterface
{
    /**
     * @return Product[]|Builder[]|Collection
     */
    public function getAll();

    /**
     * @param int $productId
     *
     * @return Product[]|Builder[]|Collection
     */
    public function getById(int $productId);

    /**
     * @param int $categoryId
     *
     * @return Product[]|Collection
     */
    public function getByCategory(int $categoryId);

    /**
     * @param Product $product
     */
    public function flush(Product $product);
}
