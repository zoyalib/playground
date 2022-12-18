<?php

declare(strict_types=1);

use App\Quotes;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Spiral\RoadRunner\Http\PSR7Worker;

/** @var \Psr\Container\ContainerInterface $container */
$container = require __DIR__ . '/../bootstrap/container.php';

$psrFactory = new Psr17Factory();

$psr7 = new PSR7Worker(\Spiral\RoadRunner\Worker::create(), $psrFactory, $psrFactory, $psrFactory);

while (true) {
    try {
        $request = $psr7->waitRequest();

        if (! $request instanceof ServerRequestInterface) {
            break;
        }
    } catch (Throwable $e) {
        $psr7->respond(new Response(400));
        continue;
    }

    try {
        $psr7->respond(new Response(200, [], Quotes::getQuote()));
    } catch (Throwable $e) {
        $psr7->respond(new Response(500, [], 'Something went wrong'));
    }
}
