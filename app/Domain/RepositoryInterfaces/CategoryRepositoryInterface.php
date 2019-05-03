<?php

namespace App\Domain\RepositoryInterfaces;

use App\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CategoryRepositoryInterface
 */
interface CategoryRepositoryInterface
{
    /**
     * @return Category[]|Builder[]|Collection
     */
    public function getAll();

    /**
     * @param Category $category
     */
    public function flush(Category $category);
}
