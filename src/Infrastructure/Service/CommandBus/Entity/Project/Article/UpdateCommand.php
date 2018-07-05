<?php

namespace App\Infrastructure\Service\CommandBus\Entity\Project\Article;

use App\Domain\Entity\Project\ArticleInterface;
use App\Domain\Repository\Project\ArticleRepositoryInterface;
use App\Infrastructure\Service\CommandBus\Entity\EntityCommandBus;
use App\Domain\Service\CommandBus\Entity\Project\Article\UpdateCommandInterface;

class UpdateCommand extends EntityCommandBus implements UpdateCommandInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(ArticleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(ArticleInterface $article): void
    {
    }
}
