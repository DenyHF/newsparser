<?php

namespace App\Domain\Consumer\DependencyInjection;

use App\Domain\Entity\ProjectInterface;
use App\Domain\Repository\ProjectRepositoryInterface;
use App\Domain\Service\Api\Rss\ChannelParserInterface;

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
     * @param string $id
     *
     * @return ProjectInterface|null
     */
    public function getProject(string $id): ?ProjectInterface;
}
