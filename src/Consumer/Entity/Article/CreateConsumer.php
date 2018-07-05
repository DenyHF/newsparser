<?php

namespace App\Consumer\Entity\Article;

use App\Infrastructure;
use App\Domain\Entity\ProjectInterface;
use App\Domain\ValueObject\Consumer\MessageInterface;
use App\Domain\Consumer\DependencyInjection\ProjectDependencyInterface;
use App\Domain\Service\CommandBus\Entity\Project\Article\CreateCommandInterface;

/**
 * @property ProjectDependencyInterface $dependency
 */
class CreateConsumer extends Infrastructure\Consumer\Consumer
{
    /**
     * {@inheritdoc}
     */
    public const QUEUE_NAME = 'app:entity:article:create';

    /**
     * @var array
     */
    protected $projects;

    /**
     * @var ProjectDependencyInterface
     */
    protected $dependency;

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
        $project = $this->getProject($message->getPayload()['project']);
        $channelParser = new Infrastructure\Service\Api\Rss\ChannelParser();

        foreach ($project->getChannels() as $channel) {
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
