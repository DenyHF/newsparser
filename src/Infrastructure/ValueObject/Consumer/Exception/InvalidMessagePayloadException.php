<?php

namespace App\Infrastructure\ValueObject\Consumer\Exception;

use Throwable;

class InvalidMessagePayloadException extends \InvalidArgumentException
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $message = '', int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message ?: $this->getDefaultMessage(), $code, $previous);
    }

    /**
     * @return string
     */
    protected function getDefaultMessage(): string
    {
        return json_last_error_msg();
    }
}
