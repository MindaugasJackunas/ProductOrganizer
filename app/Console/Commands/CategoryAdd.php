<?php

namespace App\Console\Commands;

use App\Domain\Actions\CategoryActions;
use App\Domain\FactoryInterfaces\CategoryFactoryInterface;
use Illuminate\Console\Command;

/**
 * Class CategoryAdd
 */
class CategoryAdd extends Command
{
    /**
     * @var string
     */
    protected $signature = 'category:add';

    /**
     * @var CategoryFactoryInterface
     */
    private $categoryFactory;

    /**
     * @var CategoryActions
     */
    private $categoryActions;

    /**
     * @var string
     */
    protected $description = 'Create category interactively.';

    /**
     * CategoryAdd constructor.
     *
     * @param CategoryFactoryInterface $categoryFactory
     * @param CategoryActions $categoryActions
     */
    public function __construct(
        CategoryFactoryInterface $categoryFactory,
        CategoryActions $categoryActions
    ) {
        parent::__construct();

        $this->categoryFactory = $categoryFactory;
        $this->categoryActions = $categoryActions;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        $this->line('Creating new category.');

        $name = $this->ask('Enter name');

        $category = $this->categoryFactory->create($name);

        $this->categoryActions->save($category);

        $this->line('Category created.');
    }
}
