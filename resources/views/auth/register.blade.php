<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register|EMD</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css')}}">
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name" id="name">
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required id="email">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}" required id="password">
                </div>
                <div>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}" required id="password_confirmation">
                </div>
                <div class="message">
                    <a href="{{ route('login') }}">Already have an account</a>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>