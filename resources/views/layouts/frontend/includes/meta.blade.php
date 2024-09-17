
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
@if (env('APP_ENV') == 'local')
    <meta name="robots" content="noindex, nofollow" />
@endif
<meta name="title" content={{@$tool->meta_title ?? @$meta_title}}>
<meta name="description" content="{{@$tool->meta_description ?? @$meta_description}}">
<link rel="canonical" href="{{ url()->current() }}" />
<link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />
<link rel="alternate" hreflang="{{@$tool->language ?? 'en'}}" href="{{ url()->current() }}" />
<meta name="_token" content="{{ csrf_token() }}">