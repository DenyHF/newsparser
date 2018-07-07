<?php

namespace App\Consumer\Queue\Project\Channel;

use App\Infrastructure;
use App\Domain\Entity\ProjectInterface;
use App\Domain\ValueObject\Consumer\MessageInterface;
use App\Domain\Consumer\DependencyInjection\ProjectDependencyInterface;

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
     * @var array
     */
    protected $projects;

    /**
     * @param ProjectDependencyInterface $dependency
     */
    public function __construct(ProjectDependencyInterface $dependency)
    {
        parent::__construct($dependency);
    }

    /**
     * {@inheritdoc}
     */
    protected function onMessage(MessageInterface $message): void
    {
        $payload = $message->getPayload();
        $project = $this->getProject($payload['project']);
        $channelParser = new Infrastructure\Service\Api\Rss\ChannelParser();

        foreach ($project->getChannels() as $channel) {
            $this->dependency->getLogger()->debug('Parse Channel', ['url' => $channel->getUrl()]);

            foreach ($channelParser->getArticles($channel) as $article) {
                $this->dependency->getCreateArticleCommand()->handle($article);
            }
        }
    }

    /**
     * @param string $id
     *
     * @return ProjectInterface
     *
     * @throws \InvalidArgumentException
     */
    protected function getProject(string $id): ProjectInterface
    {
        if (false === isset($this->projects[$id])) {
            $this->projects[$id] = $this->dependency->getProjectRepository()->find($id);
        }

        if (null === $this->projects[$id]) {
            throw new \InvalidArgumentException(sprintf('Project with ID "%s" not found.', $id));
        }

        return $this->projects[$id];
    }
}
