<link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css')}}">
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
            <div class="message">
                <a href="{{ route('register') }}">don't have an account</a>
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Sign in</button>
            </div>
        </form>
    </div>
</div>