<footer class="footer">
    <div class="container">
        <div class="footer-main d-flex">
            <div class="footer-left">
                <a href="{{ route('home') }}" class="d-flex-10">
                    <img src="{{ asset('assets/frontend/image/footer-logo.svg') }}" alt="footer-logo" />
                    <p>{{ config('setting_key.logo_text') }}</p>
                </a>
            </div>
            <div class="footer-center d-flex">
                <a href="{{ route('blog') }}">{{ config('setting_key.menu_blog') }}</a>
                <a href="{{ route('EmdCustomPage.contact-us') }}">{{ config('setting_key.menu_contact') }}</a>
            </div>
            <div class="footer-right d-flex">
                <img src="{{ asset('assets/frontend/image/facebook.svg')}}" alt="facebook" />
                <img src="{{ asset('assets/frontend/image/twitter.svg')}}" alt="twitter" />
                <img src="{{ asset('assets/frontend/image/linkedin.svg')}}" alt="linkedin" />
                <img src="{{ asset('assets/frontend/image/pinterest.svg')}}" alt="pinterest" />
            </div>
        </div>
        <div class="footer-bottom d-flex">
            <div class="footer-bottom-left">
                <p>{{ config('setting_key.copyright') }}</p>
            </div>
            <div class="footer-bottom-right d-flex">
                <a href="{{ route('EmdCustomPage.privacy-policy') }}">{{ config('setting_key.menu_privacy_policy') }}</a>
                <a href="{{ route('EmdCustomPage.terms-condition') }}">{{ config('setting_key.menu_terms_condition') }}</a>
            </div>
        </div>
    </div>
</footer>