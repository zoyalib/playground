<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zoya\Http\Dispatcher\Dispatcher;

final class DispatchRequestMiddleware implements MiddlewareInterface
{
    /** @var \Zoya\Http\Dispatcher\Dispatcher */
    private Dispatcher $dispatcher;

    /**
     * @param  \Zoya\Http\Dispatcher\Dispatcher  $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ($reqHandler = $request->getAttribute('_handler')) {
            return $this->dispatcher->dispatch($reqHandler, $request);
        }

        return $handler->handle($request);
    }
}
