<?php

declare(strict_types=1);

use Silence\Kernel\Kernel;

require __DIR__ . '/../vendor/autoload.php';

(new Kernel(require_once __DIR__ . '/../app/Bootstrap/configurator.php'))->run();
