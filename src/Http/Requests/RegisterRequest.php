<?php

declare(strict_types=1);

namespace App\Http\Requests;

final class RegisterRequest
{
    /** @var string */
    private string $email;

    /** @var string */
    private string $password;

    /**
     * @param  string  $email
     * @param  string  $password
     */
    public function __construct(string $email, string $password)
    {
        $this->email    = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
