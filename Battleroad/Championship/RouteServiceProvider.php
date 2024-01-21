<?php

namespace Battleroad\Championship;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends BaseRouteProvider
{
    public function map(Router $router): void
    {
        $router->middleware(['api', 'auth:sanctum'])
            ->prefix('api/v1')
            ->namespace('Battleroad\Championship\Http\Controllers')
            ->group(base_path('Battleroad/Championship/routes/api/v1/routes.php'));
    }
}
