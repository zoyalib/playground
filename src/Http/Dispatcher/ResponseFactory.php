<?php

declare(strict_types=1);

namespace App\Http\Dispatcher;

use InvalidArgumentException;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Zoya\Http\Dispatcher\ResponseFactoryInterface;

class ResponseFactory implements ResponseFactoryInterface
{
    public function create(mixed $data): ResponseInterface
    {
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        if ($data instanceof StreamInterface) {
            return new Response(200, [], $data);
        }

        if (is_scalar($data)) {
            return new Response(200, [], (string) $data);
        }

        throw new InvalidArgumentException('Cannot create a response');
    }
}
