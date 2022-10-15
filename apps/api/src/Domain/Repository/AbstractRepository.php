<?php

namespace Domain\Repository;

use Countable;
use IteratorAggregate;
use ArrayAccess;
use Domain\Model\Identifiable;

/**
 * @template T of Identifiable
 * @implements ArrayAccess<string, T>
 * @implements IteratorAggregate<string, T>
 */
abstract class AbstractRepository implements Countable, IteratorAggregate, ArrayAccess
{
    /**
     * @param T $identifiable 
     */
    abstract public function add(Identifiable $identifiable): void;

    /**
     * @return T 
     */
    abstract public function find(string $uuid): Identifiable;

    abstract public function remove(string $uuid): void;
}