<?php

namespace App\Infrastructure\Consumer\DependencyInjection;

use Psr\Log\LoggerInterface;
use App\Domain\Consumer\QueueInterface;
use App\Domain\Repository\ProjectRepositoryInterface;
use App\Domain\Service\Api\Rss\ChannelParserInterface;
use App\Domain\Service\CommandBus\Entity\Project\Article;
use App\Domain\Consumer\DependencyInjection\ProjectDependencyInterface;

class ProjectDependency extends ConsumerDependency implements ProjectDependencyInterface
{
    /**
     * @var ChannelParserInterface
     */
    protected $channelParser;

    /**
     * @var ProjectRepositoryInterface
     */
    protected $projectRepository;

    /**
     * @var Article\CreateCommandInterface
     */
    protected $createArticleCommand;

    /**
     * @param QueueInterface                 $queue
     * @param LoggerInterface                $logger
     * @param ChannelParserInterface         $channelParser
     * @param ProjectRepositoryInterface     $projectRepository
     * @param Article\CreateCommandInterface $createArticleCommand
     */
    public function __construct(
        QueueInterface $queue,
        LoggerInterface $logger,
        ChannelParserInterface $channelParser,
        ProjectRepositoryInterface $projectRepository,
        Article\CreateCommandInterface $createArticleCommand
    )
    {
        parent::__construct($queue, $logger);

        $this->channelParser = $channelParser;
        $this->projectRepository = $projectRepository;
        $this->createArticleCommand = $createArticleCommand;
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
     * {@inheritdoc}
     */
    public function getCreateArticleCommand(): Article\CreateCommandInterface
    {
        return $this->createArticleCommand;
    }
}
