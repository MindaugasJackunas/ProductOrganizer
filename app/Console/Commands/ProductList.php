<?php

namespace App\Console\Commands;

use App\Domain\Actions\ProductActions;
use App\Product;
use Illuminate\Console\Command;

/**
 * Class ProductList
 */
class ProductList extends Command
{
    protected $signature = 'product:list {--category=}';

    protected $description = 'List products';

    /**
     * @var ProductActions
     */
    private $productActions;

    /**
     * ProductList constructor.
     *
     * @param ProductActions $productActions
     */
    public function __construct(ProductActions $productActions)
    {
        parent::__construct();

        $this->productActions = $productActions;
    }

    public function handle()
    {
        $categoryId = $this->option('category');

        if (is_null($categoryId)) {
            $products = $this->productActions
                ->getAll();
        } else {
            $categoryId = (int) $categoryId;
            $products = $this->productActions
                ->getByCategoryId($categoryId);
        }

        if ($products->count() === 0) {
            $this->info('No products available.');
        } else {
            $products = $products->map(function($product) {
                return (array) $product;
            });

            $this->table(Product::COLUMNS, $products->toArray());
        }
    }
}