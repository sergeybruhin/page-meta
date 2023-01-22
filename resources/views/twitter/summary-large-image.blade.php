<meta name=”twitter:card” content=”summary_large_image”>

@if(!empty($twitterCard->site))
    <meta name=”twitter:site” content=”{{ $twitterCard->site }}”/>
@endif

@if(!empty($twitterCard->creator))
    <meta name=”twitter:creator” content=”{{ $twitterCard->creator }}”/>
@endif

@if(!empty($twitterCard->title))
    <meta name=”twitter:title” content=”{{ $twitterCard->title }}”/>
@endif

@if(!empty($twitterCard->description))
    <meta name=”twitter:description” content=”{{ $twitterCard->description }}”/>
@endif

@if(!empty($twitterCard->image))
    <meta name=”twitter:image” content=”{{ $twitterCard->image }}”/>
@endif

