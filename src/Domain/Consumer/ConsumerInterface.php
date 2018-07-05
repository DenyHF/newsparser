<?php

namespace App\Domain\Consumer;

interface ConsumerInterface
{
    /**
     * Executes the consumer.
     */
    public function consume(): void;
}
