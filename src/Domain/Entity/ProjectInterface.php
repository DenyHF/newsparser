<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\Collection;

interface ProjectInterface
{
    /**
     * @return null|string
     */
    public function getId(): ?string;

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void;

    /**
     * @return null|string
     */
    public function getDomain(): ?string;

    /**
     * @param Project\ChannelInterface $channel
     */
    public function addChannel(Project\ChannelInterface $channel): void;

    /**
     * @param Project\ChannelInterface $channel
     */
    public function removeChannel(Project\ChannelInterface $channel): void;

    /**
     * @return Collection|Project\ChannelInterface[]
     */
    public function getChannels(): Collection;

    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return null|string
     */
    public function getName(): ?string;
}
