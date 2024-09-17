<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Meta title meta description with yield --}}
    @if (env('APP_ENV') == 'local')
        <meta name="robots" content="noindex, nofollow" />
    @endif
    <meta name="title" content={{@$tool->meta_title ?? @$meta_title}}>
    <meta name="description" content="{{@$tool->meta_description ?? @$meta_description}}">
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />
    <link rel="alternate" hreflang="{{@$tool->language ?? 'en'}}" href="{{ url()->current() }}" />
    {{-- csrf --}}
    <meta name="_token" content="{{ csrf_token() }}">
    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">

    @include('frontend/head')

    <title>{{ @$tool->tool_name ?? @$page->name }}</title>
</head>

<body>

    @include('frontend/header')

    @yield('content')


    @include('frontend/footer')
</body>

</html>
