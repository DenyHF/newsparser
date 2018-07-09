<?php

namespace App\Document\Project;

use App\Infrastructure;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="projects_articles", repositoryClass="App\Repository\Project\ArticleRepository")
 * @MongoDB\Indexes({
 *     @MongoDB\Index(keys={"createdAt"="desc"})
 * })
 */
class Article extends Infrastructure\Entity\Project\Article
{
    /**
     * @MongoDB\Id(strategy="UUID")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="App\Document\Project\Channel", cascade={"all"})
     */
    protected $channel;

    /**
     * @MongoDB\ReferenceMany(targetDocument="App\Document\Tag", cascade={"all"})
     */
    protected $tags;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $url;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $title;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $description;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $image;

    /**
     * @MongoDB\Field(name="created_at", type="date")
     */
    protected $createdAt;
}
