<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Silence\Views\ViewRendererInterface;

readonly class SiteController
{
    public function __construct(private ViewRendererInterface $viewRenderer)
    {
    }

    public function home(): ResponseInterface
    {
        return $this->viewRenderer->render('site/home.html.twig');
    }
}
