<?php

declare(strict_types=1);

namespace App\Http\Controller\Index;

use Psr\Http\Message\ServerRequestInterface;

final class IndexAction
{
    public function __invoke(ServerRequestInterface $request): string
    {
        return 'Beauty is a sign of intelligence. - Andy Warhol' . PHP_EOL . $request->getUri()->getPath();
    }
}
