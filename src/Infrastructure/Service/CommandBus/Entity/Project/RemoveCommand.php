<?php

namespace App\Infrastructure\Service\CommandBus\Entity\Project;

use App\Domain\Entity\ProjectInterface;
use App\Domain\Repository\ProjectRepositoryInterface;
use App\Infrastructure\Service\CommandBus\Entity\EntityCommandBus;
use App\Domain\Service\CommandBus\Entity\Project\RemoveCommandInterface;

class RemoveCommand extends EntityCommandBus implements RemoveCommandInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(ProjectRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(ProjectInterface $project): void
    {
        $this->repository->getEntityManager()->remove($project);
    }
}
