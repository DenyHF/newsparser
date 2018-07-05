<?php

namespace App\Infrastructure\Service\CommandBus\Entity\Project\Article;

use App\Domain\Entity\Project\ArticleInterface;
use App\Domain\Repository\Project\ArticleRepositoryInterface;
use App\Infrastructure\Service\CommandBus\Entity\EntityCommandBus;
use App\Domain\Service\CommandBus\Entity\Project\Article\CreateCommandInterface;

class CreateCommand extends EntityCommandBus implements CreateCommandInterface
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
        if (null === $this->repository->findOneBy(['url' => $article->getUrl()])) {
            $this->repository->getEntityManager()->persist($article);
            $this->repository->getEntityManager()->flush();
        }
    }
}
