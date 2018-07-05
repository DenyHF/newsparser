<?php

namespace App\Domain\Service\CommandBus\Entity\Project;

use App\Domain\Entity\ProjectInterface;

interface UpdateCommandInterface
{
    /**
     * @param ProjectInterface $project
     */
    public function handle(ProjectInterface $project): void;
}
