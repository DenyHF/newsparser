<?php

namespace App\Infrastructure\Service\Api\Rss;

use App\Document\Project\Article;
use App\Domain\Entity\Project\ChannelInterface;
use App\Domain\Service\Api\Rss\ChannelParserInterface;

class ChannelParser implements ChannelParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function getArticles(ChannelInterface $channel): iterable
    {
        $xml = file_get_contents($channel->getUrl());
        $rss = new \SimpleXMLElement($xml);

        foreach ($rss->channel->item as $element) {
            $item = new Element\Item($element);
            $article = new Article($channel);

            $article->setUrl($item->getUrl());
            $article->setTitle($item->getTitle());
            $article->setImage($item->getImage());
            $article->setDescription($item->getDescription());

            yield $article;
        }
    }

}
