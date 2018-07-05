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

        foreach ($rss->channel->item as $item) {
            $article = new Article($channel);

            $article->setUrl($item->link);
            $article->setTitle($this->getText($item->title));
            $article->setImage($this->getImage($item->image));
            $article->setDescription($this->getText($item->description));

            yield $article;
        }
    }

    /**
     * @param string $text
     *
     * @return string
     */
    protected function getText(string $text): string
    {
        return \trim(\strip_tags($text));
    }

    /**
     * @param string $image
     *
     * @return string
     */
    protected function getImage(string $image): string
    {
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        if (false !== strpos($image, '<img') && preg_match('#src=["\'](.*?)["\']#i', $image, $matches)) {
            return $matches[1];
        }

        return $image;
    }
}
