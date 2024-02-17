<?php

namespace Battleroad\Account\Infra;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends BaseRouteProvider
{
    public function map(Router $router): void
    {
        $router->middleware(['api', 'auth:sanctum'])
            ->prefix('api/v1')
            ->as('api.v1.')
            ->group(base_path('Battleroad/Account/Infra/routes/api/v1/routes.php'));
    }
}
