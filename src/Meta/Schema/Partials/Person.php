<?php

namespace SergeyBruhin\PageMeta\Meta\Schema\Partials;

use SergeyBruhin\PageMeta\Meta\Schema\Schema;

class Person extends Schema
{
    public string $type = 'Person';

    public string $name;
    public ?string $url = null;

    public function __construct(string $name, ?string $url = null)
    {
        $this->name = $name;
        $this->url = $url;
    }
}
