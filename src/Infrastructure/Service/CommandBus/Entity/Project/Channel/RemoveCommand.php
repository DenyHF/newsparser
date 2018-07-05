<?php

namespace App\Infrastructure\Service\CommandBus\Entity\Project\Channel;

use App\Domain\Entity\Project\ChannelInterface;
use App\Domain\Repository\Project\ChannelRepositoryInterface;
use App\Infrastructure\Service\CommandBus\Entity\EntityCommandBus;
use App\Domain\Service\CommandBus\Entity\Project\Channel\RemoveCommandInterface;

class RemoveCommand extends EntityCommandBus implements RemoveCommandInterface
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
        $this->repository->getEntityManager()->remove($Channel);
    }
}
