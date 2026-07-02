<?php

namespace SergeyBruhin\PageMeta\Meta\Schema\Partials;

use SergeyBruhin\PageMeta\Meta\Schema\Schema;

class PostalAddress extends Schema
{
    public string $type = 'PostalAddress';

    public ?string $streetAddress = null;
    public ?string $addressLocality = null;
    public ?string $addressRegion = null;
    public ?string $postalCode = null;
    public ?string $addressCountry = null;

    public function setStreetAddress(?string $streetAddress): self
    {
        $this->streetAddress = $streetAddress;
        return $this;
    }

    public function setAddressLocality(?string $addressLocality): self
    {
        $this->addressLocality = $addressLocality;
        return $this;
    }

    public function setAddressRegion(?string $addressRegion): self
    {
        $this->addressRegion = $addressRegion;
        return $this;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function setAddressCountry(?string $addressCountry): self
    {
        $this->addressCountry = $addressCountry;
        return $this;
    }
}
