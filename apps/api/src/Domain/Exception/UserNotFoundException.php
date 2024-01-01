<?php

declare(strict_types=1);

namespace Domain\Exception;

class UserNotFoundException extends AbstractException
{
    public function __construct(
        string $message = 'User not found',
        \Exception $previous = null
    ) {
        parent::__construct($message, $previous);
    }
}
