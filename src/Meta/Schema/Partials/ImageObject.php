<?php

namespace SergeyBruhin\PageMeta\Meta\Schema\Partials;

use SergeyBruhin\PageMeta\Meta\Schema\Schema;

class ImageObject extends Schema
{
    public string $type = 'ImageObject';

    public string $url;
    public ?int $width = null;
    public ?int $height = null;

    public function __construct(string $url, ?int $width = null, ?int $height = null)
    {
        $this->url = $url;
        $this->width = $width;
        $this->height = $height;
    }
}
