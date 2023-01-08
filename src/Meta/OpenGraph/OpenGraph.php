<?php

namespace SergeyBruhin\PageMeta\Meta\OpenGraph;

use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;
use SergeyBruhin\PageMeta\Meta\OpenGraph\Partials\Image;

abstract class OpenGraph
{
    public string $type;
    public string $title;
    public ?string $description = null;
    public ?string $siteName = null;
    public string $url;
    public ?string $locale;
    public ?string $localeAlternate;
    public Collection $images;
    public Collection $videos;
    public Collection $audio;

    const TYPE_WEBSITE = 'website'; // Default
    const TYPE_ARTICLE = 'article'; // This object represents an article on a website. It is the preferred type for blog posts and news stories.
    const TYPE_BOOK = 'book'; // This object type represents a book or publication. This is an appropriate type for ebooks, as well as traditional paperback or hardback books. Do not use this type to represent magazines
    const TYPE_PROFILE = 'profile'; // This object type represents a person. While appropriate for celebrities, artists, or musicians, this object type can be used for the profile of any individual.
    const TYPE_PLACE = 'place'; // This object type represents a place - such as a venue, a business, a landmark, or any other location which can be identified by longitude and latitude.
    const TYPE_PRODUCT = 'product'; // This object type represents a product. This includes both virtual and physical products, but it typically represents items that are available in an online store.
    const TYPE_PRODUCT_GROUP = 'product.group'; // This object type represents a group of product items.
    const TYPE_PRODUCT_ITEM = 'product.item'; // This object type represents a product item.
    const TYPE_RESTAURANT_RESTAURANT = 'restaurant.restaurant'; // This object type represents a restaurant at a specific location.
    const TYPE_BUSINESS_BUSINESS = 'business.business'; // This object type represents a business at a specific location.
    const TYPE_RESTAURANT_MENU = 'restaurant.menu'; // This object type represents a restaurant's menu. A restaurant can have multiple menus, and each menu has multiple sections.
    const TYPE_RESTAURANT_MENU_SECTION = 'restaurant.menu_section'; // This object type represents a section in a restaurant's menu. A section contains multiple menu items.
    const TYPE_RESTAURANT_MENU_ITEM = 'restaurant.menu_item'; // This object type represents a single item on a restaurant's menu. Every item belongs within a menu section.
    const TYPE_VIDEO_OTHER = 'video.other'; // This object type represents a generic video, and contains references to the actors and other professionals involved in its production. For specific types of video content, use the video.movie or video.tv_show object types. This type is for any other type of video content not represented elsewhere (eg. trailers, music videos, clips, news segments etc.)


    #[Pure] public function __construct(string $url, string $title, string $description, string $siteName = null)
    {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->siteName = $siteName;
        $this->images = new Collection;
        $this->videos = new Collection;
        $this->audio = new Collection;
    }

    /**
     * @param string|null $locale
     * @return OpenGraph
     */
    public function setLocale(?string $locale): OpenGraph
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @param string|null $localeAlternate
     * @return OpenGraph
     */
    public function setLocaleAlternate(?string $localeAlternate): OpenGraph
    {
        $this->localeAlternate = $localeAlternate;
        return $this;
    }

    public function pushImage(Image $image)
    {
        $this->images->add($image);
    }

    public function addImage(string $url, int $width = null, int $height = null, string $type = null)
    {
        $this->images->add(
            (new Image($url, $width, $height, $type))
        );
    }

}
