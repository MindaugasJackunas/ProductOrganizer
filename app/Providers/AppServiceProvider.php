<?php

namespace App\Providers;

use App\Domain\FactoryInterfaces\CategoryFactoryInterface;
use App\Domain\FactoryInterfaces\ProductFactoryInterface;
use App\Domain\RepositoryInterfaces\CategoryRepositoryInterface;
use App\Domain\RepositoryInterfaces\ProductRepositoryInterface;
use App\Infrastructure\Factories\CategoryFactory;
use App\Infrastructure\Factories\ProductFactory;
use App\Infrastructure\Repositories\CategoryRepository;
use App\Infrastructure\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryFactoryInterface::class, CategoryFactory::class);
        $this->app->bind(ProductFactoryInterface::class, ProductFactory::class);

        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
