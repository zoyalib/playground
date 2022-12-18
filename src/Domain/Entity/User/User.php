<?php

declare(strict_types=1);

namespace App\Domain\Entity\User;

class User
{
    /** @var string */
    private string $id;

    /** @var string */
    private string $email;

    /** @var string */
    private string $password;

    /**
     * @param  string  $id
     * @param  string  $email
     * @param  string  $password
     */
    public function __construct(string $id, string $email, string $password)
    {
        $this->id       = $id;
        $this->email    = $email;
        $this->password = $password;
    }
}
