<?php

namespace App\Domain\Entity\Project;

use App\Domain\Entity\TagInterface;
use App\Domain\Entity\ProjectInterface;

interface ChannelInterface
{
    /**
     * @return null|string
     */
    public function getId(): ?string;

    /**
     * @return ProjectInterface
     */
    public function getProject(): ProjectInterface;

    /**
     * @return TagInterface|null
     */
    public function getTag(): ?TagInterface;

    /**
     * @param string $url
     */
    public function setUrl(string $url): void;

    /**
     * @return null|string
     */
    public function getUrl(): ?string;
}
