{{--Todo: Add Twitter Card template--}}
{{--<meta name=”twitter:card” content=”app”>--}}
{{--<meta name=”twitter:site” content=”@yourwebsite”>--}}
{{--<meta name=”twitter:description” content=”your description”>--}}
{{--<meta name=”twitter:app:country” content=”your country like US”>--}}
{{--<meta name=”twitter:app:name:iphone” content=”your iphone app name”>--}}
{{--<meta name=”twitter:app:id:iphone” content=”your iphone app ID”>--}}
{{--<meta name=”twitter:app:url:iphone” content=”your iphone app URL”>--}}
{{--<meta name=”twitter:app:name:ipad” content=”your ipad app name”>--}}
{{--<meta name=”twitter:app:id:ipad” content=”your ipad app ID”>--}}
{{--<meta name=”twitter:app:url:ipad” content=”your ipad app URL”>--}}
{{--<meta name=”twitter:app:name:googleplay” content=”your googleplay app name”>--}}
{{--<meta name=”twitter:app:id:googleplay” content=”your googleplay app ID”>--}}

<meta name=”twitter:card” content=”app”>

@if(!empty($twitterCard->site))
    <meta name=”twitter:site” content=”{{ $twitterCard->site }}”/>
@endif


