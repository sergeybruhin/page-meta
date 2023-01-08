<?php

namespace SergeyBruhin\PageMeta\Meta\OpenGraph\Partials;

class Image
{
    public string $url;
    public ?string $secureUrl;
    public ?int $width;
    public ?int $height;
    public ?string $type;

    public const TYPE_JPEG = 'image/jpeg';
    public const TYPE_PNG = 'image/png';
    public const TYPE_GIF = 'image/gif';
    public const TYPE_WEBP = 'image/webp';


    public function __construct(string $url, int $width = null, int $height = null, string $type = null)
    {
        $this->url = $url;
        $this->width = $width;
        $this->height = $height;
        $this->type = $type;
        $this->checkSecureUrl();
    }

    private function checkSecureUrl()
    {
        if (str_starts_with($this->url, 'https')) {
            $this->secureUrl = $this->url;
        }
    }
}
