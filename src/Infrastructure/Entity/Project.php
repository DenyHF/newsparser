<?php

namespace App\Infrastructure\Entity;

use App\Domain;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

class Project implements Domain\Entity\ProjectInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var ArrayCollection|Domain\Entity\Project\ChannelInterface[]
     */
    protected $channels;

    /**
     * @var string
     */
    protected $name;

    /**
     * Project constructor.
     */
    public function __construct()
    {
        $this->channels = new ArrayCollection();
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
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * {@inheritdoc}
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * {@inheritdoc}
     */
    public function addChannel(Domain\Entity\Project\ChannelInterface $channel): void
    {
        $this->channels->add($channel);
    }

    /**
     * {@inheritdoc}
     */
    public function removeChannel(Domain\Entity\Project\ChannelInterface $channel): void
    {
        $this->channels->removeElement($channel);
    }

    /**
     * {@inheritdoc}
     */
    public function getChannels(): Collection
    {
        return $this->channels;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }
}
