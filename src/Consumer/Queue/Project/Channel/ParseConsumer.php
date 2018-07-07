<?php

namespace App\Consumer\Queue\Project\Channel;

use App\Infrastructure;
use App\Domain\ValueObject\Consumer\MessageInterface;
use App\Domain\Consumer\DependencyInjection\ProjectDependencyInterface;
use App\Domain\Service\CommandBus\Entity\Project\Article\CreateCommandInterface;

/**
 * @property ProjectDependencyInterface $dependency
 */
class ParseConsumer extends Infrastructure\Consumer\Consumer
{
    /**
     * {@inheritdoc}
     */
    public const QUEUE_NAME = 'app:queue:project:channel:parse';

    /**
     * @var CreateCommandInterface
     */
    protected $createArticleCommand;

    /**
     * @param ProjectDependencyInterface $dependency
     * @param CreateCommandInterface     $createArticleCommand
     */
    public function __construct(ProjectDependencyInterface $dependency, CreateCommandInterface $createArticleCommand)
    {
        parent::__construct($dependency);

        $this->createArticleCommand = $createArticleCommand;
    }

    /**
     * {@inheritdoc}
     */
    protected function onMessage(MessageInterface $message): void
    {
        $payload = $message->getPayload();
        $project = $this->dependency->getProject($payload['project']);
        $channelParser = new Infrastructure\Service\Api\Rss\ChannelParser();

        foreach ($project->getChannels() as $channel) {
            $this->dependency->getLogger()->debug('Parse Channel', ['url' => $channel->getUrl()]);

            foreach ($channelParser->getArticles($channel) as $article) {
                $this->createArticleCommand->handle($article);
            }
        }
    }
}
