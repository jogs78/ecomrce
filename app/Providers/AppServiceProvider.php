<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Categoria;
use Illuminate\Support\Facades\Schema;

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
        if (!$this->app->runningInConsole()) {
            if (Schema::hasTable('categorias')) {
                $categorias = Categoria::all();
                View::share('categorias', $categorias);
            }
        }
    }
}
