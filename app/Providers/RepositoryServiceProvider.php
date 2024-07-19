<?php

namespace App\Providers;

use App\Interfaces\IProductService;
use App\Interfaces\IUserService;
use App\Services\ProductService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IProductService::class, ProductService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
