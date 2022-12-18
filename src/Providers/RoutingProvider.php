<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Controller\Index\IndexAction;
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
        $r->addRoute('GET', '/', IndexAction::class);
    }
}
