<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Nyholm\Psr7\Response;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zoya\Http\Dispatcher\Dispatcher;

final class DispatchRequestMiddleware implements MiddlewareInterface
{
    /** @var \Zoya\Http\Dispatcher\Dispatcher */
    private Dispatcher $dispatcher;

    /** @var \Psr\Container\ContainerInterface */
    private ContainerInterface $container;

    /**
     * @param  \Zoya\Http\Dispatcher\Dispatcher   $dispatcher
     * @param  \Psr\Container\ContainerInterface  $container
     */
    public function __construct(Dispatcher $dispatcher, ContainerInterface $container)
    {
        $this->dispatcher = $dispatcher;
        $this->container  = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ($reqHandler = $request->getAttribute('_handler')) {
            return $this->dispatcher->dispatch($reqHandler, $request);
        }

        return $handler->handle($request);
    }
}
