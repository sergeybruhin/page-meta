<?php

namespace SergeyBruhin\PageMeta\Facades;

use Illuminate\Support\Facades\Facade;

class PageMeta extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'page-meta';
    }
}
