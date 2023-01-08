<?php

namespace SergeyBruhin\PageMeta\Meta\OpenGraph\Partials;

final class ContactData
{
    public ?string $countryName;
    public ?string $region;
    public ?string $locality; // City or town
    public ?string $streetAddress;
    public ?string $postalCode;

    public function __construct(
        string $countryName = null,
        string $region = null,
        string $locality = null,
        string $streetAddress = null,
               $postalCode = null
    )
    {
        $this->countryName = $countryName;
        $this->region = $region;
        $this->locality = $locality;
        $this->streetAddress = $streetAddress;
        $this->postalCode = $postalCode;
    }
}
