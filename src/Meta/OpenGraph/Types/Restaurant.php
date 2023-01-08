<?php

namespace SergeyBruhin\PageMeta\Meta\OpenGraph\Types;

use SergeyBruhin\PageMeta\Meta\OpenGraph\OpenGraph;

final class Restaurant extends OpenGraph
{
    public function __construct(string $url, string $title, string $description, string $siteName = null)
    {
        parent::__construct($url, $title, $description, $siteName);
        $this->type = self::TYPE_RESTAURANT_RESTAURANT;
    }

}
