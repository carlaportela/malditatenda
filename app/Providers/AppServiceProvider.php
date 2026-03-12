<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cesta;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /*
        Esto hace que todas las vistas tengan $contadorCesta disponible
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

        $contadorCesta = 0;

        if(Auth::check()){
            $contadorCesta = Cesta::where('idUsuario', Auth::user()->idUsuario)
                ->sum('cantidad');
        }

        $view->with('contadorCesta', $contadorCesta);
        });
    }
}
