<?php

namespace App\Infrastructure\Consumer\DependencyInjection;

use Psr\Log\LoggerInterface;
use App\Domain\Entity\ProjectInterface;
use App\Domain\Consumer\QueueInterface;
use App\Domain\Repository\ProjectRepositoryInterface;
use App\Domain\Service\Api\Rss\ChannelParserInterface;
use App\Domain\Consumer\DependencyInjection\ProjectDependencyInterface;

class ProjectDependency extends ConsumerDependency implements ProjectDependencyInterface
{
    /**
     * @var array
     */
    protected $projects;

    /**
     * @var ChannelParserInterface
     */
    protected $channelParser;

    /**
     * @var ProjectRepositoryInterface
     */
    protected $projectRepository;

    /**
     * @param QueueInterface             $queue
     * @param LoggerInterface            $logger
     * @param ChannelParserInterface     $channelParser
     * @param ProjectRepositoryInterface $projectRepository
     */
    public function __construct(
        QueueInterface $queue,
        LoggerInterface $logger,
        ChannelParserInterface $channelParser,
        ProjectRepositoryInterface $projectRepository
    )
    {
        parent::__construct($queue, $logger);

        $this->channelParser = $channelParser;
        $this->projectRepository = $projectRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getChannelParser(): ChannelParserInterface
    {
        return $this->channelParser;
    }

    /**
     * {@inheritdoc}
     */
    public function getProjectRepository(): ProjectRepositoryInterface
    {
        return $this->projectRepository;
    }

    /**
     * @param string $id
     *
     * @return ProjectInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getProject(string $id): ProjectInterface
    {
        if (false === isset($this->projects[$id])) {
            $this->projects[$id] = $this->projectRepository->find($id);
        }

        if (null === $this->projects[$id]) {
            throw new \InvalidArgumentException(sprintf('Project with ID "%s" not found.', $id));
        }

        return $this->projects[$id];
    }
}
