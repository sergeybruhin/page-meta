<?php

namespace SergeyBruhin\PageMeta\Meta\Schema\Types;

use Illuminate\Support\Collection;
use SergeyBruhin\PageMeta\Meta\Schema\Partials\ImageObject;
use SergeyBruhin\PageMeta\Meta\Schema\Partials\PostalAddress;
use SergeyBruhin\PageMeta\Meta\Schema\Schema;

class Organization extends Schema
{
    public const TYPE_ORGANIZATION = 'Organization';
    public const TYPE_LOCAL_BUSINESS = 'LocalBusiness';

    public string $name;
    public string $url;
    public ?string $description = null;
    public ?ImageObject $logo = null;
    public ?ImageObject $image = null;
    public ?string $telephone = null;
    public ?string $email = null;
    public ?PostalAddress $address = null;
    public Collection $sameAs;
    public ?string $priceRange = null;

    public function __construct(string $name, string $url, string $type = self::TYPE_ORGANIZATION)
    {
        $this->name = $name;
        $this->url = $url;
        $this->type = $type;
        $this->sameAs = new Collection;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setLogo(?ImageObject $logo): self
    {
        $this->logo = $logo;
        return $this;
    }

    public function setImage(?ImageObject $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setAddress(?PostalAddress $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function addSameAs(string $url): self
    {
        $this->sameAs->add($url);
        return $this;
    }

    public function addSameAsMany(array $urls): self
    {
        foreach ($urls as $url) {
            $this->addSameAs($url);
        }
        return $this;
    }

    public function setPriceRange(?string $priceRange): self
    {
        $this->priceRange = $priceRange;
        return $this;
    }
}
