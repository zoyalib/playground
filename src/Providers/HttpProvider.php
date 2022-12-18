<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Dispatcher\RequestBodyDecoder;
use App\Http\Dispatcher\ResponseFactory;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Zoya\Http\Dispatcher\ArgumentResolver;
use Zoya\Http\Dispatcher\Dispatcher;
use Zoya\Http\Dispatcher\DispatcherImpl;
use Zoya\Http\Dispatcher\HandlerFactory;

final class HttpProvider
{
    public function __invoke(ContainerBuilder $builder): void
    {
        $builder->addDefinitions(
            [
                Dispatcher::class => fn(ContainerInterface $container) => new DispatcherImpl(
                    new HandlerFactory($container),
                    new ResponseFactory(),
                    new ArgumentResolver(new RequestBodyDecoder())
                ),
            ]
        );
    }
}
