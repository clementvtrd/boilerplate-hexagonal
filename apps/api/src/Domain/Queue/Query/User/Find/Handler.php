<?php

declare(strict_types=1);

namespace Domain\Queue\Query\User\Find;

use Domain\Collection\UsersInterface;

class Handler
{
    public function __construct(private readonly UsersInterface $users)
    {
    }

    public function __invoke(Input $input): Output
    {
        $user = $this->users->find($input->email);

        return new Output($user);
    }
}
