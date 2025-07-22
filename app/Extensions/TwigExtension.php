<?php

declare(strict_types=1);

namespace App\Extensions;

use Silence\Kernel\KernelConfig;
use Silence\KernelExtension\AbstractExtension;
use Silence\Views\TwigRenderer;
use Silence\Views\ViewRendererInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * This extension registers twig as a content renderer.
 */
class TwigExtension extends AbstractExtension
{
    public function configure(ContainerBuilder $container, KernelConfig $config): void
    {
        $viewPath = $config->getBasePath() . '/resources/views';

        $environment = new Definition(
            Environment::class,
            [
                new Definition(FilesystemLoader::class, [$viewPath]),
                [
                    'cache' => $config->getBasePath() . '/storage/cache/views',
                    'debug' => true,
                ],
            ]
        );

        $container->setDefinition(Environment::class, $environment);
        $container
            ->setDefinition(ViewRendererInterface::class, new Definition(TwigRenderer::class))
            ->setAutowired(true)
        ;
    }
}
