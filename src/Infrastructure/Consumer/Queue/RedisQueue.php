<?php

namespace App\Infrastructure\Consumer\Queue;

use App\Domain\Consumer\QueueInterface;
use App\Domain\ValueObject\Consumer\MessageInterface;
use App\Infrastructure\ValueObject\Consumer\Message;
use SymfonyBundles\RedisBundle\Redis\ClientInterface;

class RedisQueue implements QueueInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function consume(): ?MessageInterface
    {
        if ($context = $this->client->pop($this->name)) {
            return new Message($context);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function produce(MessageInterface $message): void
    {
        $this->client->push($this->name, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function create(string $name): QueueInterface
    {
        $queue = new self($this->client);
        $queue->setName($name);

        return $queue;
    }
}
