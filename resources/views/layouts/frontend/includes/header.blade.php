<nav id="main_header">
    <div class="navbar d-flex">
        <div class="navbar-logo d-flex-jc-ai-g">
            <a href="{{ route('home') }}" class="logo-img nav-list-active">
                <div class="logo">
                    <img src="{{ asset('assets/frontend/image/logo.svg') }}" alt="logo" />
                </div>
                <div>
                    <p class="logo-text nav-list-active">Texty Audio</p>
                </div>
            </a>
        </div>
        <div class="nav-list d-flex-jc-ai">
            <a href="{{ route('home') }}" class="active">Text To Speech</a>
            <a href="{{ route('tool', 'speech-to-text') }}">Speech To Text</a>
            <a href="{{ route('blog') }}" class="">Blogs</a>
            <a href="{{ route('EmdCustomPage.contact-us') }}" class="">Contact</a>
            <div id="language" class="language-switcher">
                <span class="name" id="selected-language">English</span>
                <img src="{{ asset('assets/frontend/image/language_drop.svg') }}" alt="language">
                <ul class="language-dropdown">
                    <li data-lang="en">
                        <a href="#">
                            <img src="{{ asset('assets/frontend/image/en.svg') }}" alt="en">
                            <span>English</span>
                        </a>
                    </li>
                    <li data-lang="es">
                        <a href="#">
                            <img src="{{ asset('assets/frontend/image/es.svg') }}" alt="es">
                            <span>Spanish</span>
                        </a>
                    </li>
                    <li data-lang="de">
                        <a href="#">
                            <img src="{{ asset('assets/frontend/image/de.svg') }}" alt="de">
                            <span>German</span>
                        </a>
                    </li>
                    <li data-lang="ja">
                        <a href="#">
                            <img src="{{ asset('assets/frontend/image/ja.svg') }}" alt="ja">
                            <span>Japanese</span>
                        </a>
                    </li>
                    <li data-lang="fr">
                        <a href="#">
                            <img src="{{ asset('assets/frontend/image/fr.svg') }}" alt="fr">
                            <span>French</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-div">
        <div class="navbar-mobile">
            <div class="mobile-logo d-flex-10">
                <a href="/" class="logo-img nav-list-active">
                    <div class="logo">
                        <img src="{{ asset('assets/frontend/image/logo.svg') }}" alt="logo" />
                    </div>
                    <div>
                        <p class="logo-text nav-list-active">Texty Audio</p>
                    </div>
                </a>
            </div>
            <div class="toogle_header">
                <img id="dropdown_bar" src="{{ asset('assets/frontend/image/dropdown_bar.svg') }}" alt="toogle" />
            </div>
        </div>
        <div class="mobile-dropdown">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('blog') }}">Blogs</a>
            <a href="{{ route('EmdCustomPage.contact-us') }}">Contact</a>
        </div>
    </div>
</nav>
