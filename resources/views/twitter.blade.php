<?php /** @var \SergeyBruhin\PageMeta\Meta\Twitter\TwitterCard $twitterCard */ ?>

@if(isset($twitterCard))
    @switch($twitterCard->type)
        @case($twitterCard::TYPE_SUMMARY)
            @include('page-meta::twitter.summary')
            @break
        @case($twitterCard::TYPE_SUMMARY_LARGE_IMAGE)
            @include('page-meta::twitter.summary-large-image')
            @break
    @endswitch
@endif
