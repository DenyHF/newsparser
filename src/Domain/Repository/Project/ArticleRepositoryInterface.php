<?php

namespace App\Domain\Repository\Project;

use Doctrine\MongoDB\Iterator;
use App\Domain\Entity\TagInterface;
use App\Domain\Repository\RepositoryInterface;
use App\Domain\Entity\Project\ArticleInterface;

interface ArticleRepositoryInterface extends RepositoryInterface
{
    /**
     * @param TagInterface $tag
     *
     * @return Iterator|ArticleInterface[]
     */
    public function findByTag(TagInterface $tag): Iterator;
}
