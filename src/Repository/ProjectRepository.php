<?php

namespace App\Repository;

use App\Document\Project;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Domain\Repository\ProjectRepositoryInterface;

class ProjectRepository extends Repository implements ProjectRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(DocumentManager $dm)
    {
        parent::__construct($dm, $dm->getUnitOfWork(), $dm->getClassMetadata(Project::class));
    }
}
