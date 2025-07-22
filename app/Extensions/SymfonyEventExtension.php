<?php

declare(strict_types=1);

namespace App\Extensions;

use App\Event\ApplicationFlowSubscriber;
use Psr\EventDispatcher\EventDispatcherInterface;
use Silence\Event\EventFactoryInterface;
use Silence\Event\Realizations\Symfony\SymfonyEventFactory;
use Silence\Kernel\KernelConfig;
use Silence\KernelExtension\AbstractExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * This extension registers symfony events as an event handling system.
 */
class SymfonyEventExtension extends AbstractExtension
{
    /**
     * {@inheritDoc}
     *
     * @param ContainerBuilder $container
     * @param KernelConfig $config
     * @return void
     */
    public function configure(ContainerBuilder $container, KernelConfig $config): void
    {
        $container->setDefinition(EventFactoryInterface::class, new Definition(SymfonyEventFactory::class))
            ->setPublic(true)
            ->setAutowired(true)
        ;

        $container->setDefinition(EventDispatcherInterface::class, new Definition(EventDispatcher::class))
            ->setPublic(true)
            ->setAutowired(true)
        ;

        $container->getDefinition(EventDispatcherInterface::class)
            ->addMethodCall('addSubscriber', [
                (new Definition(ApplicationFlowSubscriber::class))->setAutowired(true)
            ])
        ;
    }
}
