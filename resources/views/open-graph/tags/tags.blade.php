@if($openGraph->tags->count())
    @foreach($openGraph->tags as $openGraphTag)
        <meta property="article:tag" content="{{ $openGraphTag }}">
    @endforeach
@endif
