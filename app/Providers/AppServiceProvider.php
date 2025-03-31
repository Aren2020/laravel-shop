<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Product;
use App\Services\UserService;
use App\Events\UserRegistered;
use Laravel\Passport\Passport;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Read\UserReadRepository;
use App\Repositories\Write\UserWriteRepository;
use App\Repositories\Read\ProductReadRepository;
use App\Repositories\Write\ProductWriteRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Passport::enablePasswordGrant();

        Event::listen(
            UserRegistered::class,
            SendWelcomeEmail::class,
        );

        app()->bind(CategoryService::class, function ($app) { return new CategoryService(); });

        app()->bind(ProductService::class, function ($app) { return new ProductService(); });
        app()->bind(ProductReadRepository::class, function ($app) { return new ProductReadRepository(); });
        app()->bind(ProductWriteRepository::class, function ($app) { return new ProductWriteRepository( new Product() ); });

        app()->bind(UserService::class, function ($app) { return new UserService(); });
        app()->bind(UserWriteRepository::class, function ($app) { return new UserWriteRepository( new User() ); });
        app()->bind(UserReadRepository::class, function ($app) { return new UserReadRepository(); });
    }
}
