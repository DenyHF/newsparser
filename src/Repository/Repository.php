<?php

namespace App\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Doctrine\Common\Persistence\ObjectManager;
use App\Domain\Repository\RepositoryInterface;

abstract class Repository extends DocumentRepository implements RepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getEntityManager(): ObjectManager
    {
        return $this->dm;
    }
}
