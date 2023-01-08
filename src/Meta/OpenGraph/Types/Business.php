<?php

namespace SergeyBruhin\PageMeta\Meta\OpenGraph\Types;

use SergeyBruhin\PageMeta\Meta\OpenGraph\OpenGraph;
use SergeyBruhin\PageMeta\Meta\OpenGraph\Partials\ContactData;

final class Business extends OpenGraph
{
    public ContactData $contactData;

    public function __construct(string $url, string $title, string $description, string $siteName = null)
    {
        parent::__construct($url, $title, $description, $siteName);
    }

    /**
     * @param ContactData $contactData
     * @return Business
     */
    public function setContactData(ContactData $contactData): Business
    {
        $this->contactData = $contactData;
        return $this;
    }
}
