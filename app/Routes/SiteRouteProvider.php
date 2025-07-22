<?php

declare(strict_types=1);

namespace App\Routes;

use App\Http\Controllers\SiteController;
use Silence\Routing\RouteGroupInterface;
use Silence\Routing\RouteInterface;
use Silence\Routing\RouteProviderInterface;
use Silence\Routing\HttpRoute as Route;

/**
 * Basic route provider.
 */
class SiteRouteProvider implements RouteProviderInterface
{
    /**
     * {@inheritDoc}
     *
     * @return list<RouteInterface|RouteGroupInterface>
     */
    public function getRoutes(): array
    {
        return [
            Route::get('/', [SiteController::class, 'home']),
        ];
    }
}
