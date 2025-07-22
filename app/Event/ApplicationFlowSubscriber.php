<?php

declare(strict_types=1);

namespace App\Event;

use DateTimeImmutable;
use Psr\Log\LoggerInterface;
use Silence\Event\Realizations\Symfony\Types\KernelBooted;
use Silence\Event\Realizations\Symfony\Types\OnResponse;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

readonly class ApplicationFlowSubscriber implements EventSubscriberInterface
{
    private LoggerInterface $logger;
    private float $bootTime;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelBooted::class => 'booted',
            OnResponse::class => 'onResponse',
        ];
    }

    public function booted(): void
    {
        $this->bootTime = microtime(true);
        $this->logger->info(
            sprintf('[BOOT] Application started at %s', (new DateTimeImmutable())->format('Y-m-d H:i:s.u'))
        );
    }

    public function onResponse(): void
    {
        $now = microtime(true);
        $durationMs = ($now - $this->bootTime) * 1000;
        $this->logger->info(sprintf('[RESPONSE] Response sent after %.2f ms', $durationMs));
    }
}
