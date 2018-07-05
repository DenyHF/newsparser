<?php

namespace App\Repository\Project;

use App\Repository\Repository;
use App\Document\Project\Channel;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Domain\Repository\Project\ChannelRepositoryInterface;

class ChannelRepository extends Repository implements ChannelRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(DocumentManager $dm)
    {
        parent::__construct($dm, $dm->getUnitOfWork(), $dm->getClassMetadata(Channel::class));
    }
}
