<?php

declare(strict_types=1);

namespace App\Adapter\Repositories;

use App\App\Repositories\UserRepository;
use App\Domain\Entity\User\User;

class UserRepositoryImpl implements UserRepository
{
    public function save(User $user): void
    {
    }
}
