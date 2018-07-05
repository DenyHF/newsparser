<?php

namespace App\Domain\Entity;

interface TagInterface
{
    /**
     * @return null|string
     */
    public function getId(): ?string;

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void;

    /**
     * @return null|string
     */
    public function getSlug(): ?string;

    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return null|string
     */
    public function getName(): ?string;
}
