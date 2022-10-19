<?php

namespace Domain\Repository;

use Domain\Model\Identifiable;

/**
 * @template T of Identifiable
 */
interface Repository
{
    /**
     * @param T $identifiable
     */
    public function add(Identifiable $identifiable): void;

    /**
     * @return T
     */
    public function find(string $uuid): Identifiable;

    public function remove(string $uuid): void;
}
