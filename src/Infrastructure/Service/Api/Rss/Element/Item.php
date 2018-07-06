<?php

namespace App\Infrastructure\Service\Api\Rss\Element;

class Item
{
    /**
     * @var \DOMDocument
     */
    protected $dom;

    /**
     * @var \SimpleXMLElement
     */
    protected $element;

    /**
     * @param \SimpleXMLElement $element
     */
    public function __construct(\SimpleXMLElement $element)
    {
        $this->element = $element;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->element->link;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return \trim(\strip_tags($this->element->title));
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        if (isset($this->element->image)) {
            if (\filter_var($this->element->image, FILTER_VALIDATE_URL)) {
                return $this->element->image;
            }

            if (\preg_match('#src=["\'](.*?)["\']#i', $this->element->image, $matches)) {
                return $matches[1];
            }
        }

        foreach ($this->getDom()->getElementsByTagName('meta') as $meta) {
            if ($meta->getAttribute('property') === 'og:image') {
                return $meta->getAttribute('content');
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return \trim(\strip_tags($this->element->description));
    }

    /**
     * @return \DOMDocument
     */
    protected function getDom(): \DOMDocument
    {
        if (null === $this->dom) {
            $this->dom = new \DOMDocument();
            $this->dom->loadHTML(\file_get_contents($this->getUrl()), \LIBXML_NOERROR);
        }

        return $this->dom;
    }
}
