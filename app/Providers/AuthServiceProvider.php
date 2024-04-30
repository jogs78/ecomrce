<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Producto;
use App\Models\Usuario;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('comprar', function (Usuario $user, Producto $producto)
        {
            if($user->id != $producto->propietario_id){
                return true;
            }else{
                return false;
            }
        });
        //
    }
}
