<?php

namespace App\Domain\FactoryInterfaces;

use App\Category;

/**
 * Interface CategoryFactoryInterface
 */
interface CategoryFactoryInterface
{
    /**
     * @param string $name
     *
     * @return Category
     */
    public function create(string $name) : Category;
}