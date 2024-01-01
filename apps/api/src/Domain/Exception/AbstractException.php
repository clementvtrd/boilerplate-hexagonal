<?php

declare(strict_types=1);

namespace Domain\Exception;

use Exception;

abstract class AbstractException extends \Exception
{
    /**
     * @var array<string,int>
     *
     * @phpstan-var array<class-string<Exception>,int>
     */
    protected static array $codes = [
        UserNotFoundException::class => 404,
    ];

    public function __construct(
        string $message,
        \Exception $previous = null
    ) {
        parent::__construct($message, $this->getStatusCode(), $previous);
    }

    public function getStatusCode(): int
    {
        if (!array_key_exists(static::class, self::$codes)) {
            throw new \RuntimeException('Unknown exception code, please updates codes array', 500);
        }

        return self::$codes[static::class];
    }
}
