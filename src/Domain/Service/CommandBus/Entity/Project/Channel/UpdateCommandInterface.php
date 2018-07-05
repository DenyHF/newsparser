<?php

namespace App\Domain\Service\CommandBus\Entity\Project\Channel;

use App\Domain\Entity\Project\ChannelInterface;

interface UpdateCommandInterface
{
    /**
     * @param ChannelInterface $Channel
     */
    public function handle(ChannelInterface $Channel): void;
}
