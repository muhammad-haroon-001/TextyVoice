<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Meta title meta description with yield --}}
    <meta name="title" content=@yield('metaTitle')>
    <meta name="description" content=@yield('metaDescription')>
    {{-- csrf --}}
    <meta name="_token" content="{{ csrf_token() }}">
    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">

    @include('frontend/head')

    <title>Document</title>
</head>

<body>

    @include('frontend/header')

    @yield('content')



    @include('frontend/footer')
</body>

</html>
