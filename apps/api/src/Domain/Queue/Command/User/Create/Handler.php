<?php

declare(strict_types=1);

namespace Domain\Queue\Command\User\Create;

use Domain\Collection\UsersInterface;
use Domain\Model\User;

class Handler
{
    public function __construct(private readonly UsersInterface $users)
    {
    }

    public function __invoke(Input $input): void
    {
        $this->users->add(
            new User(
                $input->email,
                $input->password
            )
        );
    }
}
