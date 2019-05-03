<?php

namespace App\Console\Commands;

use App\Category;
use App\Domain\Actions\CategoryActions;
use Illuminate\Console\Command;

/**
 * Class CategoryList
 */
class CategoryList extends Command
{
    /**
     * @var string
     */
    protected $signature = 'category:list';

    /**
     * @var string
     */
    protected $description = 'List categories.';

    /**
     * @var CategoryActions
     */
    private $categoryActions;

    /**
     * CategoryList constructor.
     *
     * @param CategoryActions $categoryActions
     */
    public function __construct(CategoryActions $categoryActions)
    {
        parent::__construct();

        $this->categoryActions = $categoryActions;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        $categories = $this->categoryActions->getAll();

        if ($categories->count() === 0) {
            $this->info('No categories available.');
        } else {
            $this->table(Category::COLUMNS, $categories);
        }
    }
}
