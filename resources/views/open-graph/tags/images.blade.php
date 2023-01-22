@if($openGraph->images->count())
        <?php /** @var \SergeyBruhin\PageMeta\Meta\OpenGraph\Partials\Image $openGraphImage */ ?>
    @foreach($openGraph->images as $openGraphImage)
        <meta property="og:image" content="{{ $openGraphImage->url }}">
        @if(!empty($openGraphImage->secureUrl))
            <meta property="og:image:secure_url" content="{{ $openGraphImage->secureUrl }}">
        @endif
        @if(!empty($openGraphImage->width))
            <meta property="og:image:width" content="{{ $openGraphImage->width }}">
        @endif
        @if(!empty($openGraphImage->height))
            <meta property="og:image:height" content="{{ $openGraphImage->height }}">
        @endif
        @if(!empty($openGraphImage->type))
            <meta property="og:image:type" content="{{ $openGraphImage->type }}">
        @endif
    @endforeach
@endif
