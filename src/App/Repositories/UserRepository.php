<?php

declare(strict_types=1);

namespace App\App\Repositories;

use App\Domain\Entity\User\User;

interface UserRepository
{
    /**
     * @param  \App\Domain\Entity\User\User  $user
     */
    public function save(User $user): void;
}
