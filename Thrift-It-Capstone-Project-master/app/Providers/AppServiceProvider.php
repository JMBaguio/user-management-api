<?php

namespace App\Providers;
use App\Models\Categories;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Share categories across all views
        // View::composer('*', function ($view) {
        //     $view->with('categories', Categories::all());
        // });

    }
}
