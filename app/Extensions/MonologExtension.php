<?php

declare(strict_types=1);

namespace App\Extensions;

use Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Processor\PsrLogMessageProcessor;
use Psr\Log\LoggerInterface;;
use Silence\Kernel\KernelConfig;
use Silence\KernelExtension\AbstractExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

/**
 * This extension registers monolog as an implementation of the PSR-3 logger.
 *
 * By default, we only reserve the service by the name of the {@see LoggerInterface}.
 */
class MonologExtension extends AbstractExtension
{
    /**
     * {@inheritDoc}
     *
     * @throws Exception
     */
    public function configure(ContainerBuilder $container, KernelConfig $config): void
    {
        $definition = (new Definition(Logger::class))
            ->setArguments(
                [
                    '$name' => 'System',
                    '$handlers' => [
                        new StreamHandler($config->getBasePath() . '/var/log/system.log', Level::Info)
                    ],
                    '$processors' => [
                        new PsrLogMessageProcessor(),
                    ],
                ]
            )
        ;

        $container
            ->setDefinition(LoggerInterface::class, $definition)
            ->setAutowired(true)
        ;
    }
}
