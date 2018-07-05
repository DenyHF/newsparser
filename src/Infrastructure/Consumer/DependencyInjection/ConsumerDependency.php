<?php

namespace App\Infrastructure\Consumer\DependencyInjection;

use Psr\Log\LoggerInterface;
use App\Domain\Consumer\QueueInterface;
use App\Domain\Consumer\DependencyInjection\ConsumerDependencyInterface;

class ConsumerDependency implements ConsumerDependencyInterface
{
    /**
     * @var QueueInterface
     */
    protected $queue;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param QueueInterface  $queue
     * @param LoggerInterface $logger
     */
    public function __construct(QueueInterface $queue, LoggerInterface $logger)
    {
        $this->queue = $queue;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function getQueue(): QueueInterface
    {
        return $this->queue;
    }

    /**
     * {@inheritdoc}
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}
