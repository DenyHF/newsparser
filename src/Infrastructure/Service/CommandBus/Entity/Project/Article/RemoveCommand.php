<?php

namespace App\Infrastructure\Service\CommandBus\Entity\Project\Article;

use App\Domain\Entity\Project\ArticleInterface;
use App\Domain\Repository\Project\ArticleRepositoryInterface;
use App\Infrastructure\Service\CommandBus\Entity\EntityCommandBus;
use App\Domain\Service\CommandBus\Entity\Project\Article\RemoveCommandInterface;

class RemoveCommand extends EntityCommandBus implements RemoveCommandInterface
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
        $this->repository->getEntityManager()->remove($article);
    }
}
