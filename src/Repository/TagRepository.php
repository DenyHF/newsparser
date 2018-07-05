<?php

namespace App\Repository;

use App\Document\Tag;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Domain\Repository\TagRepositoryInterface;

class TagRepository extends Repository implements TagRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(DocumentManager $dm)
    {
        parent::__construct($dm, $dm->getUnitOfWork(), $dm->getClassMetadata(Tag::class));
    }
}
