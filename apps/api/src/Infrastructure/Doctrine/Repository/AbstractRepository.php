<?php

declare(strict_types=1);

namespace Infrastructure\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @phpstan-template T of object
 *
 * @phpstan-extends ServiceEntityRepository<T>
 */
abstract class AbstractRepository extends ServiceEntityRepository
{
    /**
     * @phpstan-param T $entity
     */
    public function add(object $entity): void
    {
        $this->_em->persist($entity);
    }
}
