<?php

namespace Battleroad\Account\Infra;

use Battleroad\Account\Infra\Models\PersonalAccessToken;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Laravel\Sanctum\Sanctum;

class ServiceProvider extends IlluminateServiceProvider
{
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->loadMigrationsFrom(
            base_path('Battleroad/Account/Infra/Database/Migrations')
        );
    }

    public function boot()
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
