<?php

namespace App\Infrastructure\Entity\Project;

use App\Domain;

class Channel implements Domain\Entity\Project\ChannelInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var Domain\Entity\ProjectInterface
     */
    protected $project;

    /**
     * @var Domain\Entity\TagInterface
     */
    protected $tag;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param Domain\Entity\TagInterface     $tag
     * @param Domain\Entity\ProjectInterface $project
     */
    public function __construct(Domain\Entity\TagInterface $tag, Domain\Entity\ProjectInterface $project)
    {
        $this->tag = $tag;
        $this->project = $project;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getProject(): Domain\Entity\ProjectInterface
    {
        return $this->project;
    }

    /**
     * @return Domain\Entity\TagInterface|null
     */
    public function getTag(): ?Domain\Entity\TagInterface
    {
        return $this->tag;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
}
