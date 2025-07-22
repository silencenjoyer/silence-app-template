<?php

/*
 * This is a file that specifies the configuration of the kernel and application extensions.
 */

declare(strict_types=1);

use App\Extensions\MonologExtension;
use App\Extensions\RouteExtension;
use App\Extensions\SymfonyEventExtension;
use App\Extensions\TwigExtension;
use Silence\Kernel\KernelConfig;

return KernelConfig::withBasePath(dirname(__DIR__, 2))
    ->withExtensions([
        new RouteExtension(),
        new TwigExtension(),
        new SymfonyEventExtension(),
        new MonologExtension(),
    ])
;
