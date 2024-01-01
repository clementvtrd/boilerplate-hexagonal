<?php

declare(strict_types=1);

namespace Domain\Queue\Query\User\Find;

use Domain\Model\User;

class Output
{
    public function __construct(
        public readonly User $user
    ) {
    }
}
