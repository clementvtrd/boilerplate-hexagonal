<?php

declare(strict_types=1);

namespace Domain\Collection;

use Domain\Model\User;

interface UsersInterface
{
    public function add(User $user): void;

    public function get(string $uuid): User;

    public function find(string $email): User;
}
