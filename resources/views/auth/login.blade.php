<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | EMD</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css')}}">
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required id="email">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}" required id="password">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>