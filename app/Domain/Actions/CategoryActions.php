<?php

namespace App\Domain\Actions;

use App\Category;
use App\Domain\RepositoryInterfaces\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CategoryActions
 */
class CategoryActions
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoryActions constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return Category[]|Builder[]|Collection
     */
    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    /**
     * @param Category $category
     */
    public function save(Category $category)
    {
        $this->categoryRepository->flush($category);
    }
}
