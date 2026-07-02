<?php

namespace SergeyBruhin\PageMeta\Meta\Schema\Types;

use Illuminate\Support\Collection;
use SergeyBruhin\PageMeta\Meta\Schema\Partials\ListItem;
use SergeyBruhin\PageMeta\Meta\Schema\Schema;

class BreadcrumbList extends Schema
{
    public string $type = 'BreadcrumbList';

    public Collection $itemListElement;

    public function __construct()
    {
        $this->itemListElement = new Collection;
    }

    public function addItem(string $name, ?string $url = null): self
    {
        $position = $this->itemListElement->count() + 1;
        $this->itemListElement->add(new ListItem($position, $name, $url));
        return $this;
    }

    /**
     * @param array<int, array{url?: string, name: string}> $breadcrumbs
     */
    public static function fromArray(array $breadcrumbs): self
    {
        $list = new self();

        foreach ($breadcrumbs as $breadcrumb) {
            $list->addItem($breadcrumb['name'], $breadcrumb['url'] ?? null);
        }

        return $list;
    }
}
