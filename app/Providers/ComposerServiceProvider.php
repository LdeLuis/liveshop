<?php

namespace App\Providers;

// use App\Configuracion;
use Illuminate\Support\ServiceProvider;
// use App\Servicio;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $views = ['layouts.partials.header', 'layouts.partials.footer'];

        // view()->composer($views, function ($view) {
        //     // $servicios = Servicio::all();
        //     $config = Configuracion::first();

        //     // $view->with('servicios', $servicios)->with('config', $config);
        //     $view->with('config', $config);
        // });
    }
}
