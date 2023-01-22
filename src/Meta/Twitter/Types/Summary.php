<?php

namespace SergeyBruhin\PageMeta\Meta\Twitter\Types;

use SergeyBruhin\PageMeta\Meta\Twitter\TwitterCard;

class Summary extends TwitterCard
{
    public string $url;
    public string $title;
    public string $image;

    public function __construct(string $title, string $description = '', string $image = '', string $site = null)
    {
        parent::__construct($description, $site);
        $this->type = self::TYPE_SUMMARY;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }
}
