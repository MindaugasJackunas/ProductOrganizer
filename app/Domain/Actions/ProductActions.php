<?php

namespace App\Domain\Actions;

use App\Domain\RepositoryInterfaces\ProductRepositoryInterface;
use App\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ProductActions
 */
class ProductActions
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductActions constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return Product[]|Builder[]|Collection
     */
    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    /**
     * @param int $productId
     *
     * @return mixed
     */
    public function getById(int $productId)
    {
        return $this->productRepository->getById($productId)->first();
    }

    /**
     * @param int $categoryId
     *
     * @return Product[]|Collection
     */
    public function getByCategoryId(int $categoryId)
    {
        return $this->productRepository->getByCategory($categoryId);
    }

    /**
     * @param Product $product
     */
    public function save(Product $product)
    {
       $this->productRepository->flush($product);
    }
}
