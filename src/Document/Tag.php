<?php

namespace App\Document;

use App\Infrastructure;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="tags", repositoryClass="App\Repository\TagRepository")
 * @MongoDB\Indexes({
 *     @MongoDB\Index(keys={"slug"="asc"})
 * })
 */
class Tag extends Infrastructure\Entity\Tag
{
    /**
     * @MongoDB\Id(strategy="UUID")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $slug;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $name;
}
