<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}?v={{ config('setting_key.project_version') }}">
<title>@yield('title', env('APP_NAME'))</title>
@stack('style')