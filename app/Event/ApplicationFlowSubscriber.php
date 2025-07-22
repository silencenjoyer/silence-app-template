<?php

declare(strict_types=1);

namespace App\Event;

use DateTimeImmutable;
use Psr\Log\LoggerInterface;
use Silence\Event\Realizations\Symfony\Types\KernelBooted;
use Silence\Event\Realizations\Symfony\Types\OnResponse;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * This is the base class for system event subscribers.
 *
 * It records the time taken by the application to process the request.
 */
readonly class ApplicationFlowSubscriber implements EventSubscriberInterface
{
    private LoggerInterface $logger;
    private float $bootTime;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     *
     * @return array<string, string>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelBooted::class => 'booted',
            OnResponse::class => 'onResponse',
        ];
    }

    /**
     * A method that records the kernel startup in the log.
     *
     * @return void
     */
    public function booted(): void
    {
        $this->bootTime = microtime(true);
        $this->logger->info(
            sprintf('[BOOT] Application started at %s', (new DateTimeImmutable())->format('Y-m-d H:i:s.u'))
        );
    }

    /**
     * A method that records the completion of request processing and response sending.
     *
     * It also records how much time was required for processing.
     *
     * @return void
     */
    public function onResponse(): void
    {
        $now = microtime(true);
        $durationMs = ($now - $this->bootTime) * 1000;
        $this->logger->info(sprintf('[RESPONSE] Response sent after %.2f ms', $durationMs));
    }
}
