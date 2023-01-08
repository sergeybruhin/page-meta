<?php

namespace SergeyBruhin\PageMeta\Meta\OpenGraph\Types;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use SergeyBruhin\PageMeta\Meta\OpenGraph\OpenGraph;

final class Article extends OpenGraph
{
    public ?Carbon $publishedTime = null;
    public ?Carbon $modifiedTime = null;
    public ?Carbon $expirationTime = null;
    public Collection $authors; // Urls to Authors Profiles
    public Collection $tags;
    public ?string $section = null;

    public function __construct(string $url, string $title, string $description, string $siteName = null)
    {
        parent::__construct($url, $title, $description, $siteName);
        $this->type = self::TYPE_ARTICLE;
        $this->authors = new Collection;
        $this->tags = new Collection;
    }

    /**
     * @param Carbon|null $publishedTime
     * @return Article
     */
    public function setPublishedTime(?Carbon $publishedTime): Article
    {
        $this->publishedTime = $publishedTime;
        return $this;
    }

    /**
     * @param Carbon|null $modifiedTime
     * @return Article
     */
    public function setModifiedTime(?Carbon $modifiedTime): Article
    {
        $this->modifiedTime = $modifiedTime;
        return $this;
    }

    /**
     * @param Carbon|null $expirationTime
     * @return Article
     */
    public function setExpirationTime(?Carbon $expirationTime): Article
    {
        $this->expirationTime = $expirationTime;
        return $this;
    }

    public function addAuthor(string $url): Article
    {
        $this->authors->add($url);
        return $this;
    }

    public function addAuthors(array $authorUrls): Article
    {
        if (count($authorUrls)) {
            foreach ($authorUrls as $authorUrl) {
                $this->addAuthor($authorUrl);
            }
        }
        return $this;
    }

    public function addTag(string $tagName): Article
    {
        $this->tags->add($tagName);
        return $this;
    }

    public function addTags(array $tags): Article
    {
        if (count($tags)) {
            foreach ($tags as $tag) {
                $this->addTag($tag);
            }
        }
        return $this;
    }


}
