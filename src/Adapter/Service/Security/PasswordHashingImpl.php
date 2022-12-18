<?php

declare(strict_types=1);

namespace App\Adapter\Service\Security;

use App\App\Service\Security\PasswordHashing;

class PasswordHashingImpl implements PasswordHashing
{
    public function hash(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }
}
