<?php

namespace App\Domain\Service\Api\Rss;

use App\Domain\Entity\Project\ArticleInterface;
use App\Domain\Entity\Project\ChannelInterface;

interface ChannelParserInterface
{
    /**
     * @param ChannelInterface $channel
     *
     * @return iterable|ArticleInterface[]
     */
    public function getArticles(ChannelInterface $channel): iterable;
}
