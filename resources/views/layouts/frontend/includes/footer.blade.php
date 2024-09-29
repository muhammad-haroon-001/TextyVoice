<footer class="footer">
    <div class="container">
        <div class="footer-main d-flex">
            <div class="footer-left">
                <a href="{{ route('home') }}" class="d-flex-10">
                    <img src="{{ asset('assets/frontend/image/footer-logo.svg') }}" alt="footer-logo" />
                    <p>Texty Audio</p>
                </a>
            </div>
            <div class="footer-center d-flex">
                <a href="#features" class="features">Features</a>
                <a href="{{ route('blog') }}">Blogs</a>
                <a href="{{ route('EmdCustomPage.contact-us') }}">Contact</a>
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
                <p>&copy; 2024 textyaudio.com All Right Reserved</p>
            </div>
            <div class="footer-bottom-right d-flex">
                <a href="{{ route('EmdCustomPage.privacy-policy') }}">Privacy Policy</a>
                <a href="{{ route('EmdCustomPage.terms-condition') }}">Terms & Condition</a>
            </div>
        </div>
    </div>
</footer>