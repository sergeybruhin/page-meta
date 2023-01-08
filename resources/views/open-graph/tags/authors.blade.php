@if($openGraph->authors->count())
    @foreach($openGraph->authors as $openGraphAuthor)
        <meta property="article:author" content="{{ $openGraphAuthor }}">
    @endforeach
@endif
