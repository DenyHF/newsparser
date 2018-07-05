<?php

namespace App\Infrastructure\Service\CommandBus\Entity;

use App\Domain;

abstract class EntityCommandBus
{
    /**
     * @var Domain\Repository\RepositoryInterface
     */
    protected $repository;

    /**
     * @param Domain\Repository\RepositoryInterface $repository
     */
    public function __construct(Domain\Repository\RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function commit(): void
    {
        $this->repository->getEntityManager()->flush();
    }
}
