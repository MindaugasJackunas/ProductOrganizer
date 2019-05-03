<?php

namespace App\Infrastructure\Repositories;

use App\Domain\RepositoryInterfaces\ProductRepositoryInterface;
use App\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductRepository
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        return $this->getJoinedSelect()
            ->get(Product::COLUMNS);
    }

    /**
     * {@inheritdoc}
     */
    public function getById(int $productId)
    {
        return $this->getJoinedSelect()
            ->where('products.id', $productId)
            ->get(Product::COLUMNS);
    }

    /**
     * {@inheritdoc}
     */
    public function getByCategory(int $categoryId)
    {
        return $this->getJoinedSelect()
            ->where('products.category_id', $categoryId)
            ->get(Product::COLUMNS);
    }

    /**
     * {@inheritdoc}
     */
    public function flush(Product $product)
    {
        $product->save();
    }

    /**
     * @return Builder
     */
    private function getJoinedSelect() : Builder
    {
        return DB::table('products')
            ->select('products.id as id',
                'products.name as name',
                'categories.name as category',
                'products.quantity as quantity',
                'products.price as price',
                'products.description as description'
            )->join('categories', 'products.category_id', 'categories.id');
    }
}