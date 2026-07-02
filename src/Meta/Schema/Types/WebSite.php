<?php

namespace SergeyBruhin\PageMeta\Meta\Schema\Types;

use SergeyBruhin\PageMeta\Meta\Schema\Schema;

class WebSite extends Schema
{
    public string $type = 'WebSite';

    public string $name;
    public string $url;
    public ?string $description = null;
    public ?Organization $publisher = null;

    public function __construct(string $name, string $url)
    {
        $this->name = $name;
        $this->url = $url;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setPublisher(?Organization $publisher): self
    {
        $this->publisher = $publisher;
        return $this;
    }
}
