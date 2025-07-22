<?php

declare(strict_types=1);

namespace App\Extensions;

use App\Http\Handlers\NotFoundHandler;
use App\Routes\SiteRouteProvider;
use Exception;
use Psr\Container\ContainerExceptionInterface;
use Silence\Http\Handlers\RouteHandlerInterface;
use Silence\Kernel\KernelConfig;
use Silence\KernelExtension\AbstractExtension;
use Silence\Routing\RouteProviders\RouteProviderRegistry;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class RouteExtension extends AbstractExtension
{
    /**
     * @param ContainerBuilder $container
     * @param KernelConfig $config
     * @return void
     */
    public function configure(ContainerBuilder $container, KernelConfig $config): void
    {
        $container->getDefinition(RouteHandlerInterface::class)->setArgument(
            '$fallbackHandler',
            (new Definition(NotFoundHandler::class))->setAutowired(true)
        );
    }

    /**
     * @param ContainerBuilder $container
     * @param KernelConfig $config
     * @throws ContainerExceptionInterface|Exception
     */
    public function boot(ContainerBuilder $container, KernelConfig $config): void
    {
        /** @var RouteProviderRegistry $routeRegister */
        $routeRegister = $container->get(RouteProviderRegistry::class);

        $routeRegister
            ->withRoute($container->get(SiteRouteProvider::class))
            ->register()
        ;
    }
}
