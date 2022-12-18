<?php

declare(strict_types=1);

namespace App\App\UseCase\UserCreate;

final class Command
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

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
