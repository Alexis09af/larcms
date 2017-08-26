<?php

namespace App\Providers;

use App\Views\Composers\redesSocialesComposer;
use Illuminate\Support\ServiceProvider;
use App\Views\Composers\SidebarFrontendComposer;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('frontend.sidebar.sidebar',SidebarFrontendComposer::class);

        //Singleton para mostrar las redes sociales en '*' TODAS las vistas
        view()->composer('*',redesSocialesComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
