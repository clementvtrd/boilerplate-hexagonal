<?php

declare(strict_types=1);

namespace Domain\Queue\Command\User\Create;

use Domain\Queue\Command\CommandInterface;

class Input implements CommandInterface
{
    public function __construct(
        public readonly string $email,
        public readonly string $password
    ) {
    }
}
