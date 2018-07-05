<?php

namespace App\Infrastructure\Consumer;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console;
use App\Domain\Consumer\QueueInterface;
use App\Domain\Consumer\ConsumerInterface;
use App\Domain\ValueObject\Consumer\MessageInterface;
use App\Domain\Consumer\DependencyInjection\ConsumerDependencyInterface;

/**
 * Base class for all consumers.
 *
 * @author Dmitry Khaperets <khaperets@gmail.com>
 */
abstract class Consumer extends Console\Command\Command implements ConsumerInterface
{
    /**
     * @var string The name of the queue for consumer.
     */
    public const QUEUE_NAME = 'queue:default';

    /**
     * @var int Delay time in microseconds (when the queue is empty).
     */
    public const TIMEOUT_TIME_DELAY = 1000000;

    /**
     * @var ConsumerDependencyInterface
     */
    protected $dependency;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param ConsumerDependencyInterface $dependency
     */
    public function __construct(ConsumerDependencyInterface $dependency)
    {
        $this->dependency = $dependency;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName($this->getQueueName());
        $this->dependency->getQueue()->setName($this->getQueueName());
    }

    /**
     * {@inheritdoc}
     */
    final protected function execute(Console\Input\InputInterface $input, Console\Output\OutputInterface $output)
    {
        $this->consume();
    }

    /**
     * {@inheritdoc}
     */
    public function consume(): void
    {
        while (true) {
            if ($message = $this->dependency->getQueue()->consume()) {
                try {
                    $this->onMessage($message);
                } catch (\Exception $exception) {
                    $this->onError($message, $exception);
                }
            } else {
                $this->onTimeout();
            }
        }
    }

    /**
     * Called when a message is received.
     *
     * @param MessageInterface $message
     *
     * @throws \Exception
     */
    abstract protected function onMessage(MessageInterface $message): void;

    /**
     * Called when there is no messages in the queue.
     */
    protected function onTimeout(): void
    {
        $this->dependency->getLogger()->debug(sprintf(
            'Waiting for new messages for the consumer "%s".', $this->getName()
        ));

        usleep(static::TIMEOUT_TIME_DELAY);
    }

    /**
     * Called when an error occurred while processing the message.
     *
     * @param MessageInterface $message
     * @param \Exception       $exception
     */
    protected function onError(MessageInterface $message, \Exception $exception): void
    {
        $this->dependency->getLogger()->error($exception->getMessage());
        $this->dependency->getQueue()->produce($message);
    }

    /**
     * Returns the name of the queue being processed.
     *
     * @return MessageInterface|null
     */
    protected function getQueueName(): string
    {
        return static::QUEUE_NAME;
    }
}
