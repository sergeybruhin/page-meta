<?php

namespace SergeyBruhin\PageMeta\Meta;

class HeadMeta
{
    public ?string $title = null;
    public ?string $titleSeparator = null;
    public ?string $description = null;
    public ?string $author = null;
    public ?string $canonical = null;
    public ?string $keywords = null;

    private array $robots = [];

    /**
     * @param string $title
     * @param string|null $separator  Appends config globalSiteName when provided, e.g. ' | '
     * @return static
     */
    public function setTitle(string $title, string $separator = null): static
    {
        $this->title = $title;
        $this->titleSeparator = $separator;
        return $this;
    }

    /**
     * @param string $description
     * @return static
     */
    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $author
     * @return static
     */
    public function setAuthor(string $author): static
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @param string $url
     * @return static
     */
    public function setCanonical(string $url): static
    {
        $this->canonical = $url;
        return $this;
    }

    /**
     * @param string|array $keywords
     * @return static
     */
    public function setKeywords(string|array $keywords): static
    {
        $this->keywords = is_array($keywords) ? implode(', ', $keywords) : $keywords;
        return $this;
    }

    /**
     * Replace the entire robots directive with a raw string, e.g. 'noindex, nofollow'.
     *
     * @param string $robots
     * @return static
     */
    public function setRobots(string $robots): static
    {
        $this->robots = array_map('trim', explode(',', $robots));
        return $this;
    }

    /**
     * @return static
     */
    public function noIndex(): static
    {
        return $this->addRobot('noindex');
    }

    /**
     * @return static
     */
    public function noFollow(): static
    {
        return $this->addRobot('nofollow');
    }

    /**
     * @return static
     */
    public function noArchive(): static
    {
        return $this->addRobot('noarchive');
    }

    /**
     * @return static
     */
    public function noSnippet(): static
    {
        return $this->addRobot('nosnippet');
    }

    /**
     * Returns the title, optionally suffixed with the site name.
     * Example: setTitle('My Post', ' | ') → "My Post | Site Name"
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        if ($this->title === null) {
            return null;
        }

        if ($this->titleSeparator !== null) {
            return $this->title . $this->titleSeparator . config('page-meta.globalSiteName');
        }

        return $this->title;
    }

    /**
     * Returns the robots directive string, or null if none set.
     *
     * @return string|null
     */
    public function getRobots(): ?string
    {
        return count($this->robots) ? implode(', ', array_unique($this->robots)) : null;
    }

    private function addRobot(string $directive): static
    {
        $this->robots[] = $directive;
        return $this;
    }
}
