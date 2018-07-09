<?php

namespace App\Repository\Project;

use Doctrine\MongoDB\Iterator;
use App\Repository\Repository;
use App\Document\Project\Article;
use App\Domain\Entity\TagInterface;
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

    /**
     * {@inheritdoc}
     */
    public function findByTag(TagInterface $tag): Iterator
    {
        return $this
            ->createQueryBuilder()
            ->field('tags')->includesReferenceTo($tag)
            ->getQuery()
            ->getIterator();
    }
}
