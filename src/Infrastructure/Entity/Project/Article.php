<?php

namespace App\Infrastructure\Entity\Project;

use App\Domain;
use App\Domain\Entity\TagInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

class Article implements Domain\Entity\Project\ArticleInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var Domain\Entity\Project\ChannelInterface
     */
    protected $channel;

    /**
     * @var Collection
     */
    protected $tags;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @param Domain\Entity\Project\ChannelInterface $channel
     */
    public function __construct(Domain\Entity\Project\ChannelInterface $channel)
    {
        $this->channel = $channel;
        $this->tags = new ArrayCollection([$channel->getTag()]);

        $this->setCreatedAt(new \DateTime());
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
    public function getChannel(): Domain\Entity\Project\ChannelInterface
    {
        return $this->channel;
    }

    /**
     * {@inheritdoc}
     */
    public function addTag(TagInterface $tag): void
    {
        $this->tags->add($tag);
    }

    /**
     * {@inheritdoc}
     */
    public function removeTag(TagInterface $tag): void
    {
        $this->tags->removeElement($tag);
    }

    /**
     * {@inheritdoc}
     */
    public function getTags(): Collection
    {
        return $this->tags;
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

    /**
     * {@inheritdoc}
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * {@inheritdoc}
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
}
