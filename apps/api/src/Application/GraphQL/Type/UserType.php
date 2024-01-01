<?php

declare(strict_types=1);

namespace Application\GraphQL\Type;

use Domain\Model\User;

class UserType
{
    public function __construct(private readonly User $user)
    {
    }

    public function id(): string
    {
        return $this->user->uuid;
    }

    public function email(): string
    {
        return $this->user->getEmail();
    }
}
