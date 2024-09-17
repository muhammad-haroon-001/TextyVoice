<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts/frontend/includes/meta')
    @include('layouts/frontend/includes/head')
</head>

<body>

    @include('layouts/frontend/includes/header')

    @yield('content')


    @include('layouts/frontend/includes/footer')
    @include('layouts/frontend/includes/scripts')
</body>

</html>
