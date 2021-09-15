<?php

namespace App\Providers;

use App\Models\Bolo;
use App\Models\Interessado;
use App\Observers\BoloObserver;
use App\Observers\InteressadoObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Bolo::observe(BoloObserver::class);
        Interessado::observe(InteressadoObserver::class);
    }
}
