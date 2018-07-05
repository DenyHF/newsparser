<?php

namespace App\Domain\Consumer\DependencyInjection;

use App\Domain\Repository\ProjectRepositoryInterface;
use App\Domain\Service\Api\Rss\ChannelParserInterface;
use App\Domain\Service\CommandBus\Entity\Project\Article;

interface ProjectDependencyInterface extends ConsumerDependencyInterface
{
    /**
     * @return ChannelParserInterface
     */
    public function getChannelParser(): ChannelParserInterface;

    /**
     * @return ProjectRepositoryInterface
     */
    public function getProjectRepository(): ProjectRepositoryInterface;

    /**
     * @return Article\CreateCommandInterface
     */
    public function getCreateArticleCommand(): Article\CreateCommandInterface;
}
