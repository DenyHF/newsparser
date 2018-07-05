<?php

namespace App\Infrastructure\Service\CommandBus\Entity\Project\Channel;

use App\Domain\Entity\Project\ChannelInterface;
use App\Domain\Repository\Project\ChannelRepositoryInterface;
use App\Infrastructure\Service\CommandBus\Entity\EntityCommandBus;
use App\Domain\Service\CommandBus\Entity\Project\Channel\CreateCommandInterface;

class CreateCommand extends EntityCommandBus implements CreateCommandInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(ChannelRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(ChannelInterface $Channel): void
    {
        $this->repository->getEntityManager()->persist($Channel);
    }
}
