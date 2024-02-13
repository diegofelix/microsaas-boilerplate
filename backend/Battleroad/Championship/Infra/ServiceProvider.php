<?php

namespace Battleroad\Championship\Infra;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->loadMigrationsFrom(
            base_path('Battleroad/Championship/Infra/Database/Migrations')
        );
    }
}
