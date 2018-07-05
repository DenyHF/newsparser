<?php

namespace App\Infrastructure\ValueObject\Consumer;

use App\Domain\ValueObject\Consumer\MessageInterface;

/**
 * Queue message instance.
 *
 * @author Dmitry Khaperets <khaperets@gmail.com>
 */
class Message implements MessageInterface
{
    /**
     * @var string
     */
    private $context;

    /**
     * @param string $context
     */
    public function __construct(string $context)
    {
        $this->context = $context;
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(): array
    {
        $payload = json_decode($this->context, true);

        if (json_last_error()) {
            throw new Exception\InvalidMessagePayloadException();
        }

        return $payload;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return $this->context;
    }
}
