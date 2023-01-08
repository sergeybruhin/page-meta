<?php

namespace SergeyBruhin\PageMeta\Meta\OpenGraph\Types;

use SergeyBruhin\PageMeta\Meta\OpenGraph\OpenGraph;

final class Profile extends OpenGraph
{
    public string $firstName;
    public string $lastName;
    public string $userName;

    public function __construct(string $url, string $title, string $description, string $siteName = null)
    {
        parent::__construct($url, $title, $description, $siteName);
    }

    /**
     * @param string $firstName
     * @return Profile
     */
    public function setFirstName(string $firstName): Profile
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @param string $lastName
     * @return Profile
     */
    public function setLastName(string $lastName): Profile
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @param string $userName
     * @return Profile
     */
    public function setUserName(string $userName): Profile
    {
        $this->userName = $userName;
        return $this;
    }
}
