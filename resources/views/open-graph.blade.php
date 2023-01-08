<?php /** @var \SergeyBruhin\PageMeta\Meta\OpenGraph\OpenGraph $openGraph */ ?>
@switch($openGraph->type)
    @case($openGraph::TYPE_ARTICLE)
    @include('page-meta::open-graph.article')
    @break
    @case($openGraph::TYPE_WEBSITE)
    @include('page-meta::open-graph.website')
    @break
@endswitch

