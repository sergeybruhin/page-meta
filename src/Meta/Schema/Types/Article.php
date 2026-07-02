<?php

namespace SergeyBruhin\PageMeta\Meta\Schema\Types;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use SergeyBruhin\PageMeta\Meta\Schema\Partials\ImageObject;
use SergeyBruhin\PageMeta\Meta\Schema\Partials\Person;
use SergeyBruhin\PageMeta\Meta\Schema\Schema;

class Article extends Schema
{
    public string $type = 'Article';

    public string $headline;
    public ?string $description = null;
    public ?ImageObject $image = null;
    public ?Carbon $datePublished = null;
    public ?Carbon $dateModified = null;
    public ?Person $author = null;
    public ?Organization $publisher = null;
    public ?string $mainEntityOfPage = null;
    public ?string $articleSection = null;
    public Collection $keywords;
    public ?string $url = null;

    public function __construct(string $headline)
    {
        $this->headline = $headline;
        $this->keywords = new Collection;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setImage(?ImageObject $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function setDatePublished(?Carbon $datePublished): self
    {
        $this->datePublished = $datePublished;
        return $this;
    }

    public function setDateModified(?Carbon $dateModified): self
    {
        $this->dateModified = $dateModified;
        return $this;
    }

    public function setAuthor(?Person $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function setPublisher(?Organization $publisher): self
    {
        $this->publisher = $publisher;
        return $this;
    }

    public function setMainEntityOfPage(?string $mainEntityOfPage): self
    {
        $this->mainEntityOfPage = $mainEntityOfPage;
        return $this;
    }

    public function setArticleSection(?string $articleSection): self
    {
        $this->articleSection = $articleSection;
        return $this;
    }

    public function addKeyword(string $keyword): self
    {
        $this->keywords->add($keyword);
        return $this;
    }

    public function addKeywords(array $keywords): self
    {
        foreach ($keywords as $keyword) {
            $this->addKeyword($keyword);
        }
        return $this;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }
}
