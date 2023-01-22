<?php

namespace SergeyBruhin\PageMeta\Meta\Twitter;

abstract class TwitterCard
{
    public string $description;
    public string $site;
    public string $type;

    const TYPE_SUMMARY = 'summary'; // Default
    const TYPE_SUMMARY_LARGE_IMAGE = 'summary_large_image';
    const TYPE_APP = 'app';

    public function __construct(string $description = '', string $site = '')
    {
        $this->description = $description;
        $this->site = $site;
    }
}
