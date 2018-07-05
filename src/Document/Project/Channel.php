<?php

namespace App\Document\Project;

use App\Infrastructure;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="projects_channels", repositoryClass="App\Repository\Project\ChannelRepository")
 */
class Channel extends Infrastructure\Entity\Project\Channel
{
    /**
     * @MongoDB\Id(strategy="UUID")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="App\Document\Project", cascade={"all"})
     */
    protected $project;

    /**
     * @MongoDB\ReferenceOne(targetDocument="App\Document\Tag", cascade={"all"})
     */
    protected $tag;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $url;
}
