<?php

declare(strict_types=1);

namespace App\Http\Handlers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Silence\HttpSpec\HttpCodes\CodeEnum;
use Silence\Views\ViewRendererInterface;

class NotFoundHandler implements RequestHandlerInterface
{
    public function __construct(protected ViewRendererInterface $viewRenderer)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->viewRenderer->render('not_found.html.twig')
            ->withStatus(CodeEnum::NOT_FOUND->value)
        ;
    }
}
