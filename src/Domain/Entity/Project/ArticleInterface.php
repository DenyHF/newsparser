<?php

namespace App\Domain\Entity\Project;

use App\Domain\Entity\TagInterface;
use Doctrine\Common\Collections\Collection;

interface ArticleInterface
{
    /**
     * @return null|string
     */
    public function getId(): ?string;

    /**
     * @return ChannelInterface
     */
    public function getChannel(): ChannelInterface;

    /**
     * @param TagInterface $tag
     */
    public function addTag(TagInterface $tag): void;

    /**
     * @param TagInterface $tag
     */
    public function removeTag(TagInterface $tag): void;

    /**
     * @return Collection
     */
    public function getTags(): Collection;

    /**
     * @param string $url
     */
    public function setUrl(string $url): void;

    /**
     * @return null|string
     */
    public function getUrl(): ?string;

    /**
     * @param string $title
     */
    public function setTitle(string $title): void;

    /**
     * @return null|string
     */
    public function getTitle(): ?string;

    /**
     * @param string $description
     */
    public function setDescription(string $description): void;

    /**
     * @return null|string
     */
    public function getDescription(): ?string;

    /**
     * @param string $photo
     */
    public function setImage(string $photo): void;

    /**
     * @return null|string
     */
    public function getImage(): ?string;

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void;

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime;
}
