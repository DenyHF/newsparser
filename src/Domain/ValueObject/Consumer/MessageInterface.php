<?php

namespace App\Domain\ValueObject\Consumer;

/**
 * An interface for the queue messages.
 *
 * @author Dmitry Khaperets <khaperets@gmail.com>
 */
interface MessageInterface
{
    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    public function getPayload(): array;

    /**
     * Returns the message context.
     *
     * @return string
     */
    public function __toString(): string;
}
