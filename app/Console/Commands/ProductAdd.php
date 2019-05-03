<?php

namespace App\Console\Commands;

use App\Domain\Actions\ProductActions;
use App\Domain\FactoryInterfaces\ProductFactoryInterface;
use Illuminate\Console\Command;

/**
 * Class ProductAdd
 */
class ProductAdd extends Command
{
    /**
     * {@inheridoc}
     */
    protected $signature = 'product:add';

    /**
     * @var ProductFactoryInterface
     */
    private $productFactory;

    /**
     * @var ProductActions
     */
    private $productActions;

    /**
     * {@inheridoc}
     */
    protected $description = 'Add new product';

    /**
     * ProductAdd constructor.
     *
     * @param ProductFactoryInterface $productFactory
     * @param ProductActions $productActions
     */
    public function __construct(
        ProductFactoryInterface $productFactory,
        ProductActions $productActions
    ) {
        parent::__construct();

        $this->productFactory = $productFactory;
        $this->productActions = $productActions;
    }

    public function handle()
    {
        $this->line('Creating new product.');

        $name = $this->ask('Name');
        $quantity = (int) $this->ask('Quantity');
        $price = $this->ask('Price');
        $category = (int) $this->ask('Category id');
        $description = $this->ask('Description');

        $product = $this->productFactory->create($name, $quantity, $price, $category, $description);

        $this->productActions->save($product);

        $this->line('Product created.');
    }
}