<?php

namespace App\Domain\Service\CommandBus\Entity\Tag;

use App\Domain\Entity\TagInterface;

interface CreateCommandInterface
{
    /**
     * @param TagInterface $tag
     */
    public function handle(TagInterface $tag): void;
}
