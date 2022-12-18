<?php

declare(strict_types=1);

namespace App\Providers;

use App\Adapter\Repositories\UserRepositoryImpl;
use App\Adapter\Service\Security\PasswordHashingImpl;
use App\App\Repositories\UserRepository;
use App\App\Service\Security\PasswordHashing;
use DI\ContainerBuilder;

use function DI\create;

final class AppProvider
{
    public function __invoke(ContainerBuilder $builder): void
    {
        $builder->addDefinitions(
            [
                UserRepository::class => create(UserRepositoryImpl::class),
            ]
        );

        $builder->addDefinitions(
            [
                PasswordHashing::class => create(PasswordHashingImpl::class),
            ]
        );
    }
}
