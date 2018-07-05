<?php

namespace App\Infrastructure\Service\CommandBus\Entity\Project\Channel;

use App\Domain\Entity\Project\ChannelInterface;
use App\Domain\Repository\Project\ChannelRepositoryInterface;
use App\Infrastructure\Service\CommandBus\Entity\EntityCommandBus;
use App\Domain\Service\CommandBus\Entity\Project\Channel\UpdateCommandInterface;

class UpdateCommand extends EntityCommandBus implements UpdateCommandInterface
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
    }
}
