<?php

declare(strict_types=1);

namespace App\Providers;

use DI\ContainerBuilder;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

final class RoutingProvider
{
    public function __invoke(ContainerBuilder $builder): void
    {
        $builder->addDefinitions(
            [
                Dispatcher::class => fn() => simpleDispatcher($this->addRoutes(...)),
            ]
        );
    }

    /**
     * @param  \FastRoute\RouteCollector  $r
     */
    private function addRoutes(RouteCollector $r): void
    {
        $r->get('/', 'App\Http\Controller\Index\IndexAction');

        $r->addGroup('/auth', function (RouteCollector $r) {
            $r->post('/register', 'App\Http\Controller\Auth\RegisterAction');
        });
    }
}
