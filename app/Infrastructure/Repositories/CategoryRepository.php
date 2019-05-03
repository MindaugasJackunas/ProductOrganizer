<?php

namespace App\Infrastructure\Repositories;

use App\Category;
use App\Domain\RepositoryInterfaces\CategoryRepositoryInterface;

/**
 * Class CategoryRepository
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        return Category::all(Category::COLUMNS);
    }

    /**
     * {@inheritdoc}
     */
    public function flush(Category $category)
    {
        $category->save();
    }
}
