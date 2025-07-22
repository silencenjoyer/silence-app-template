<?php

declare(strict_types=1);

namespace App\Http\Handlers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Silence\HttpSpec\HttpCodes\CodeEnum;
use Silence\Views\ViewRendererInterface;

/**
 * Basic handler for an unmatched route.
 *
 * Change it according to your needs.
 */
class NotFoundHandler implements RequestHandlerInterface
{
    public function __construct(protected ViewRendererInterface $viewRenderer)
    {
    }

    /**
     * "Page Not found" rendering.
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->viewRenderer->render('not_found.html.twig')
            ->withStatus(CodeEnum::NOT_FOUND->value)
        ;
    }
}
