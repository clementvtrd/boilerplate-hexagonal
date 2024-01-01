<?php

declare(strict_types=1);

namespace Infrastructure\Doctrine\Collection;

use Domain\Collection\UsersInterface;
use Domain\Exception\UserNotFoundException;
use Domain\Model\User;
use Infrastructure\Doctrine\Repository\UsersRepository;

class Users implements UsersInterface
{
    public function __construct(private readonly UsersRepository $repository)
    {
    }

    public function add(User $user): void
    {
        $this->repository->add($user);
    }

    public function get(string $uuid): User
    {
        $user = $this->repository->find($uuid);

        if (!$user instanceof User) {
            throw new UserNotFoundException("User with uuid {$uuid} not found");
        }

        return $user;
    }

    public function find(string $email): User
    {
        $user = $this->repository->findOneBy(['email' => $email]);

        if (!$user instanceof User) {
            throw new UserNotFoundException("User with email {$email} not found");
        }

        return $user;
    }
}
