@if(!empty($openGraph->publishedTime))
    <meta property="article:published_time" content="{{ $openGraph->publishedTime->toIso8601String() }}">
@endif
