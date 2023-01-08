@if($openGraph->images->count())
    <?php /** @var \SergeyBruhin\PageMeta\Meta\OpenGraph\Partials\Image $openGraphImage */ ?>
    @foreach($openGraph->images as $openGraphImage)
        <meta property="og:image" content="{{ $openGraphImage->url }}">
        @if($openGraphImage->secureUrl)
            <meta property="og:image:secure_url" content="{{ $openGraphImage->secureUrl }}">
        @endif
        @if($openGraphImage->width)
            <meta property="og:image:width" content="{{ $openGraphImage->width }}">
        @endif
        @if($openGraphImage->height)
            <meta property="og:image:height" content="{{ $openGraphImage->height }}">
        @endif
        @if($openGraphImage->type)
            <meta property="og:image:type" content="{{ $openGraphImage->type }}">
        @endif
    @endforeach
@endif
