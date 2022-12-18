<?php

declare(strict_types=1);

use DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';

$builder = new ContainerBuilder();

foreach (require __DIR__ . '/services.php' as $service) {
    (new $service())($builder);
}

return $builder->build();
