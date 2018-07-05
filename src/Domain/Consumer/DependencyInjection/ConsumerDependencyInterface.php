<?php

namespace App\Domain\Consumer\DependencyInjection;

use Psr\Log\LoggerInterface;
use App\Domain\Consumer\QueueInterface;

interface ConsumerDependencyInterface
{
    /**
     * @return LoggerInterface
     */
    public function getQueue(): QueueInterface;

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;
}
