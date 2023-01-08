<?php

namespace SergeyBruhin\PageMeta\Meta\OpenGraph\Types;

use SergeyBruhin\PageMeta\Meta\OpenGraph\OpenGraph;

final class Product extends OpenGraph
{
    public string $pluralTitle;
    public float $amount;
    public string $currency;

    public function __construct(string $url, string $title, string $description, string $siteName = null)
    {
        parent::__construct($url, $title, $description, $siteName);
    }

    /**
     * @param string $pluralTitle
     * @return Product
     */
    public function setPluralTitle(string $pluralTitle): Product
    {
        $this->pluralTitle = $pluralTitle;
        return $this;
    }

    /**
     * @param float $amount
     * @return Product
     */
    public function setAmount(float $amount): Product
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param string $currency
     * @return Product
     */
    public function setCurrency(string $currency): Product
    {
        $this->currency = $currency;
        return $this;
    }

}
