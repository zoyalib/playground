<?php

declare(strict_types=1);

namespace App\App\UseCase\UserCreate;

use App\App\Repositories\UserRepository;
use App\App\Service\Security\PasswordHashing;
use App\Domain\Entity\User\User;

final class Handler
{
    /** @var \App\App\Repositories\UserRepository */
    private UserRepository $users;

    /** @var \App\App\Service\Security\PasswordHashing */
    private PasswordHashing $passwordHashing;

    /**
     * @param  \App\App\Repositories\UserRepository       $users
     * @param  \App\App\Service\Security\PasswordHashing  $passwordHashing
     */
    public function __construct(UserRepository $users, PasswordHashing $passwordHashing)
    {
        $this->users           = $users;
        $this->passwordHashing = $passwordHashing;
    }

    /**
     * @param  \App\App\UseCase\UserCreate\Command  $command
     */
    public function __invoke(Command $command): void
    {
        $this->users->save(
            new User(
                $command->getId(),
                $command->getEmail(),
                $this->passwordHashing->hash($command->getPassword())
            )
        );
    }
}
