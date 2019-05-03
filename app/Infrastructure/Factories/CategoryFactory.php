<?php

namespace App\Infrastructure\Factories;

use App\Category;
use App\Domain\FactoryInterfaces\CategoryFactoryInterface;

/**
 * Class CategoryFactory
 */
class CategoryFactory implements CategoryFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(string $name) : Category
    {
        return (new Category())
            ->setName($name);
    }
}
