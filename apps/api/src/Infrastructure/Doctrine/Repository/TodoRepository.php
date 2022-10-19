<?php

declare(strict_types=1);

namespace Infrastructure\Doctrine\Repository;

use Domain\Model\Todo;

/**
 * @extends AbstractRepository<Todo>
 */
class TodoRepository extends AbstractRepository
{
    public function getAlias(): string
    {
        return Todo::class;
    }
}
