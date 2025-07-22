<?php

declare(strict_types=1);

namespace App\Routes;

use App\Http\Controllers\SiteController;
use Silence\Routing\RouteProviderInterface;
use Silence\Routing\Group;
use Silence\Routing\HttpRoute as Route;

class SiteRouteProvider implements RouteProviderInterface
{
    public function getRoutes(): array
    {
        return [
            Group::of([
                Route::get('/', [SiteController::class, 'home']),
            ]),
        ];
    }
}
