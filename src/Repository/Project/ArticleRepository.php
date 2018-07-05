<?php

namespace App\Repository\Project;

use App\Repository\Repository;
use App\Document\Project\Article;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Domain\Repository\Project\ArticleRepositoryInterface;

class ArticleRepository extends Repository implements ArticleRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(DocumentManager $dm)
    {
        parent::__construct($dm, $dm->getUnitOfWork(), $dm->getClassMetadata(Article::class));
    }
}
