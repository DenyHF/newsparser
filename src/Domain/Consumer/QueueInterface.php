<?php

namespace App\Domain\Consumer;

use App\Domain\ValueObject\Consumer\MessageInterface;

interface QueueInterface
{
    /**
     * Sets the queue name.
     *
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return MessageInterface|null
     */
    public function consume(): ?MessageInterface;

    /**
     * @param MessageInterface $message
     */
    public function produce(MessageInterface $message): void;

    /**
     * @param string $name
     *
     * @return QueueInterface
     */
    public function create(string $name): QueueInterface;
}
