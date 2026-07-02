<?php

namespace SergeyBruhin\PageMeta\Meta\Schema;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use JsonSerializable;
use ReflectionClass;
use ReflectionProperty;

abstract class Schema implements Arrayable, JsonSerializable
{
    public string $type;

    public ?string $id = null;

    public function toArray(): array
    {
        $data = ['@type' => $this->type];

        if ($this->id !== null) {
            $data['@id'] = $this->id;
        }

        foreach ($this->propsToArray() as $key => $value) {
            if ($key === 'type' || $key === 'id') {
                continue;
            }
            $data[$key] = $value;
        }

        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    protected function propsToArray(): array
    {
        $result = [];

        $reflection = new ReflectionClass($this);
        foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            if ($property->isStatic()) {
                continue;
            }

            $name = $property->getName();
            $value = $property->isInitialized($this) ? $property->getValue($this) : null;
            $normalized = $this->normalizeValue($value);

            if ($normalized === null) {
                continue;
            }

            $result[$name] = $normalized;
        }

        return $result;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    private function normalizeValue($value)
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof Carbon) {
            return $value->toIso8601String();
        }

        if ($value instanceof Collection) {
            if ($value->isEmpty()) {
                return null;
            }

            $mapped = $value->map(function ($item) {
                return $this->normalizeValue($item);
            })->values()->all();

            return count($mapped) ? $mapped : null;
        }

        if ($value instanceof Arrayable) {
            return $value->toArray();
        }

        if (is_string($value) && $value === '') {
            return null;
        }

        return $value;
    }
}
