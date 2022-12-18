<?php

declare(strict_types=1);

namespace App\Http;

use App\Http\Middleware\QuoteMiddleware;
use Psr\Container\ContainerInterface;
use Zoya\Http\AbstractKernel;

final class Kernel extends AbstractKernel
{
    /** @var \Psr\Container\ContainerInterface */
    private ContainerInterface $container;

    /**
     * @param  \Psr\Container\ContainerInterface  $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function getPipeline(): array
    {
        return [
            $this->container->get(QuoteMiddleware::class),
        ];
    }
}
