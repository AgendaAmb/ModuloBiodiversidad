<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Observers\UserObserver;
use App\Observers\FichaTecnicaObserver;
use App\User;
use App\FichaTecnica;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('menuBio',\App\View\Components\menuBio::class);
        Blade::component('typeInput',\App\View\Components\typeInput::class);
        Blade::component('Modal',\App\View\Components\Modal::class);
        User::observe(UserObserver::class);
        FichaTecnica::observe(FichaTecnicaObserver::class);
    }
}
