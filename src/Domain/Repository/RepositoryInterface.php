<?php

namespace App\Domain\Repository;

use Doctrine\Common\Collections\Selectable;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

interface RepositoryInterface extends ObjectRepository, Selectable
{
    /**
     * @return ObjectManager
     */
    public function getEntityManager(): ObjectManager;
}
