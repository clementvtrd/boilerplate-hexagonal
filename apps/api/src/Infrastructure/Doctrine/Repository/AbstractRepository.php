<?php

declare(strict_types=1);

namespace Infrastructure\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Domain\Model\Identifiable;
use Domain\Repository\Repository;

/**
 * @template T of \Domain\Model\Identifiable
 *
 * @extends EntityRepository<T>
 *
 * @implements Repository<T>
 */
abstract class AbstractRepository extends EntityRepository implements Repository
{
    public function add(Identifiable $identifiable): void
    {
    }

    public function remove(string $uuid): void
    {
    }

    /**
     * @return class-string
     */
    abstract public function getAlias(): string;
}
