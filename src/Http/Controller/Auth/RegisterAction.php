<?php

declare(strict_types=1);

namespace App\Http\Controller\Auth;

use App\App\UseCase\UserCreate;
use App\Http\Requests\RegisterRequest;
use Zoya\Bus\CommandBus;
use Zoya\Http\Dispatcher\Attribute\RequestBody;

final class RegisterAction
{
    /** @var \Zoya\Bus\CommandBus */
    private CommandBus $commandBus;

    /**
     * @param  \Zoya\Bus\CommandBus  $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(#[RequestBody] RegisterRequest $request): string
    {
        $this->commandBus->dispatch(
            new UserCreate\Command(
                (string) mt_rand(1000, 99000),
                $request->getEmail(),
                $request->getPassword()
            )
        );

        return sprintf('%s:%s', $request->getEmail(), $request->getPassword());
    }
}
