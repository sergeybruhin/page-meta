<?php

namespace SergeyBruhin\PageMeta;

use SergeyBruhin\PageMeta\Meta\OpenGraph\OpenGraph;
use SergeyBruhin\PageMeta\Meta\OpenGraph\Types\Article;
use SergeyBruhin\PageMeta\Meta\OpenGraph\Types\Business;
use SergeyBruhin\PageMeta\Meta\OpenGraph\Types\Product;
use SergeyBruhin\PageMeta\Meta\OpenGraph\Types\Profile;
use SergeyBruhin\PageMeta\Meta\OpenGraph\Types\Restaurant;
use SergeyBruhin\PageMeta\Meta\OpenGraph\Types\Website;
use SergeyBruhin\PageMeta\Meta\Twitter\Types\Summary;
use SergeyBruhin\PageMeta\Meta\Twitter\Types\SummaryLargeImage;

class PageMeta
{
    public function openGraph(string $type, string $url, string $title, string $description, string $siteName = null): OpenGraph
    {
        return match ($type) {
            OpenGraph::TYPE_ARTICLE => new Article($url, $title, $description, $siteName),
            OpenGraph::TYPE_BUSINESS_BUSINESS => new Business($url, $title, $description, $siteName),
            OpenGraph::TYPE_PRODUCT => new Product($url, $title, $description, $siteName),
            OpenGraph::TYPE_PROFILE => new Profile($url, $title, $description, $siteName),
            OpenGraph::TYPE_RESTAURANT_RESTAURANT => new Restaurant($url, $title, $description, $siteName),
            default => new Website($url, $title, $description, $siteName),
        };
    }

    public function openGraphArticle(string $url, string $title, string $description, string $siteName = null): Article
    {
        return new Article($url, $title, $description, $siteName);
    }

    public function openGraphWebsite(string $url, string $title, string $description, string $siteName = null): Website
    {
        return new Website($url, $title, $description, $siteName);
    }

    public function twitterCardSummary(string $title = '', string $imageUrl = '', string $description = '', string $site = ''): Summary
    {
        return new Summary($title, $imageUrl, $description, $site);
    }

    public function twitterCardSummaryLargeImage(string $title = '', string $imageUrl = '', string $description = '', string $site = '', string $creator = ''): SummaryLargeImage
    {
        return new SummaryLargeImage($title, $imageUrl, $description, $site, $creator);
    }
}
