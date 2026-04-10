<?php /** @var \SergeyBruhin\PageMeta\Meta\HeadMeta $headMeta */ ?>
@if(isset($headMeta))
    @if(!empty($headMeta->getTitle()))
        <title>{{ $headMeta->getTitle() }}</title>
    @endif
    @if(!empty($headMeta->description))
        <meta name="description" content="{{ $headMeta->description }}">
    @endif
    @if(!empty($headMeta->author))
        <meta name="author" content="{{ $headMeta->author }}">
    @endif
    @if(!empty($headMeta->keywords))
        <meta name="keywords" content="{{ $headMeta->keywords }}">
    @endif
    @if(!empty($headMeta->getRobots()))
        <meta name="robots" content="{{ $headMeta->getRobots() }}">
    @endif
    @if(!empty($headMeta->canonical))
        <link rel="canonical" href="{{ $headMeta->canonical }}">
    @endif
@endif
