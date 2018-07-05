<?php

namespace App\Domain\Service\CommandBus\Entity\Project\Article;

use App\Domain\Entity\Project\ArticleInterface;

interface RemoveCommandInterface
{
    /**
     * @param ArticleInterface $article
     */
    public function handle(ArticleInterface $article): void;
}
