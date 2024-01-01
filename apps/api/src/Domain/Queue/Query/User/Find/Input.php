<?php

declare(strict_types=1);

namespace Domain\Queue\Query\User\Find;

use Domain\Queue\Query\QueryInterface;

class Input implements QueryInterface
{
    public function __construct(public readonly string $email)
    {
    }
}
