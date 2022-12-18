<?php

declare(strict_types=1);

namespace App\App\Service\Security;

interface PasswordHashing
{
    /**
     * @param  string  $password
     *
     * @return string
     */
    public function hash(string $password): string;
}
