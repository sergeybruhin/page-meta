<?php

namespace SergeyBruhin\PageMeta\Meta\Schema;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use JsonSerializable;

final class SchemaGraph implements Arrayable, JsonSerializable
{
    public const CONTEXT = 'https://schema.org';

    private Collection $nodes;

    public function __construct(Schema ...$nodes)
    {
        $this->nodes = new Collection($nodes);
    }

    public function push(Schema $node): self
    {
        $this->nodes->push($node);
        return $this;
    }

    public function toArray(): array
    {
        return [
            '@context' => self::CONTEXT,
            '@graph' => $this->nodes->map(function (Schema $node) {
                return $node->toArray();
            })->values()->all(),
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
