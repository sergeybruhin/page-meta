<?php

namespace SergeyBruhin\PageMeta\Meta\Schema\Partials;

use SergeyBruhin\PageMeta\Meta\Schema\Schema;

class ListItem extends Schema
{
    public string $type = 'ListItem';

    public int $position;
    public string $name;
    public ?string $item = null;

    public function __construct(int $position, string $name, ?string $item = null)
    {
        $this->position = $position;
        $this->name = $name;
        $this->item = $item;
    }
}
