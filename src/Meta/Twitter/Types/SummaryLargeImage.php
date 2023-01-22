<?php

namespace SergeyBruhin\PageMeta\Meta\Twitter\Types;

use SergeyBruhin\PageMeta\Meta\Twitter\TwitterCard;

class SummaryLargeImage extends TwitterCard
{
    public string $url;
    public string $title;
    public string $creator;
    public string $image;

    public function __construct(string $title, string $description = '', string $image = '', string $site = null, string $creator = '')
    {
        parent::__construct($description, $site);
        $this->type = self::TYPE_SUMMARY;
        $this->title = $title;
        $this->creator = $creator;
        $this->description = $description;
        $this->image = $image;
    }
}
