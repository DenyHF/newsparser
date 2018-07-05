<?php

namespace App\Infrastructure\Service\CommandBus\Entity\Project;

use App\Domain\Entity\ProjectInterface;
use App\Domain\Repository\ProjectRepositoryInterface;
use App\Infrastructure\Service\CommandBus\Entity\EntityCommandBus;
use App\Domain\Service\CommandBus\Entity\Project\CreateCommandInterface;

class CreateCommand extends EntityCommandBus implements CreateCommandInterface
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
        $this->repository->getEntityManager()->persist($project);
    }
}
