<?php

namespace App\Document;

use App\Infrastructure;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="projects", repositoryClass="App\Repository\ProjectRepository")
 */
class Project extends Infrastructure\Entity\Project
{
    /**
     * @MongoDB\Id(strategy="UUID")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $domain;

    /**
     * @MongoDB\ReferenceMany(targetDocument="App\Document\Project\Channel", cascade={"all"})
     */
    protected $channels;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $name;
}
