<?php

namespace App\Infrastructure\Service\CommandBus\Entity\Tag;

use App\Domain\Entity\TagInterface;
use App\Domain\Repository\TagRepositoryInterface;
use App\Infrastructure\Service\CommandBus\Entity\EntityCommandBus;
use App\Domain\Service\CommandBus\Entity\Tag\CreateCommandInterface;

class CreateCommand extends EntityCommandBus implements CreateCommandInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(TagRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(TagInterface $tag): void
    {
        $this->repository->getEntityManager()->persist($tag);
    }
}
