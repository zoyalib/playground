<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use FastRoute\Dispatcher;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class MatchRouteMiddleware implements MiddlewareInterface
{
    /** @var \FastRoute\Dispatcher */
    private Dispatcher $dispatcher;

    /**
     * @param  \FastRoute\Dispatcher  $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $result = $this->dispatcher->dispatch(
            $request->getMethod(),
            $request->getUri()->getPath()
        );

        $resultCode = $result[0];

        if ($resultCode === Dispatcher::NOT_FOUND) {
            return new Response(404, [], 'Not Found');
        }

        if ($resultCode === Dispatcher::METHOD_NOT_ALLOWED) {
            return new Response(405, ['Allow' => implode(', ', $result[1])], 'Method Not Allowed');
        }

        if ($resultCode === Dispatcher::FOUND) {
            $request = $request->withAttribute('_handler', $result[1]);
        }

        return $handler->handle($request);
    }
}
