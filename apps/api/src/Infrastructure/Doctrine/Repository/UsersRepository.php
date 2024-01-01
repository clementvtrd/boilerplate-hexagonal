<?php

declare(strict_types=1);

namespace Infrastructure\Doctrine\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Domain\Model\User;

/**
 * @phpstan-extends AbstractRepository<User>
 */
class UsersRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }
}
