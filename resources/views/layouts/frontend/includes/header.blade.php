<nav id="main_header">
    <div class="navbar d-flex">
        <div class="navbar-logo d-flex-jc-ai-g">
            <a href="{{ route('home') }}" class="logo-img nav-list-active">
                <div class="logo">
                    <img src="{{ asset('assets/frontend/image/logo.svg') }}" alt="logo" />
                </div>
                <div>
                    <p class="logo-text nav-list-active">Texty Voice</p>
                </div>
            </a>
        </div>
        <div class="nav-list d-flex-jc-ai">
            <a href="{{ route('home') }}" class="active">Text To Speech</a>
            <a href="{{ route('tool', 'speech-to-text') }}">Speech To Text</a>
            <a href="{{ route('blog') }}" class="">Blogs</a>
            <a href="{{ route('EmdCustomPage.contact-us') }}" class="">Contact</a>
            @if (request()->routeIs('home') || request()->routeIs('tool') || request()->routeIs('tool.lang'))
            <div id="language" class="language-switcher">
                <span class="name" id="selected-language">English</span>
                <img src="{{ asset('assets/frontend/image/language_drop.svg') }}" alt="language" />
                <ul class="language-dropdown">
                    <li data-lang="en">
                        <img src="{{ asset('assets/frontend/image/en.svg') }}" alt="en" />
                        <span>English</span>
                    </li>
                    <li data-lang="es">
                        <img src="{{ asset('assets/frontend/image/es.svg') }}" alt="es" />
                        <span>Spanish</span>
                    </li>
                    <li data-lang="de">
                        <img src="{{ asset('assets/frontend/image/de.svg') }}" alt="de" />
                        <span>German</span>
                    </li>
                    <li data-lang="ja">
                        <img src="{{ asset('assets/frontend/image/ja.svg') }}" alt="ja" />
                        <span>Japanese</span>
                    </li>
                    <li data-lang="fr">
                        <img src="{{ asset('assets/frontend/image/fr.svg') }}" alt="fr" />
                        <span>French</span>
                    </li>
                </ul>
            </div>
            @endif
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
                        <p class="logo-text nav-list-active">Texty Voice</p>
                    </div>
                </a>
            </div>
            <div class="toogle_header">
                @if (request()->routeIs('home') || request()->routeIs('tool') || request()->routeIs('tool.lang'))
                <div id="language-mobile" class="language-switcher">
                    <span class="name" id="selected-language">English</span>
                    <img src="{{ asset('assets/frontend/image/language_drop.svg') }}" alt="language" />
                    <ul class="language-dropdown">
                        <li data-lang="en">
                            <img src="{{ asset('assets/frontend/image/en.svg') }}" alt="en" />
                            <span>English</span>
                        </li>
                        <li data-lang="es">
                            <img src="{{ asset('assets/frontend/image/es.svg') }}" alt="es" />
                            <span>Spanish</span>
                        </li>
                        <li data-lang="de">
                            <img src="{{ asset('assets/frontend/image/de.svg') }}" alt="de" />
                            <span>German</span>
                        </li>
                        <li data-lang="ja">
                            <img src="{{ asset('assets/frontend/image/ja.svg') }}" alt="ja" />
                            <span>Japanese</span>
                        </li>
                        <li data-lang="fr">
                            <img src="{{ asset('assets/frontend/image/fr.svg') }}" alt="fr" />
                            <span>French</span>
                        </li>
                    </ul>
                </div>
                @endif
                <img id="dropdown_bar" src="{{ asset('assets/frontend/image/dropdown_bar.svg') }}" alt="toogle" />
            </div>
        </div>
        <div class="mobile-dropdown">
            <a href="{{ route('home') }}">Text To Speech</a>
            <a href="{{ route('tool', 'speech-to-text') }}">Speech To Text</a>
            <a href="{{ route('blog') }}" class="">Blogs</a>
            <a href="{{ route('EmdCustomPage.contact-us') }}" class="">Contact</a>
        </div>
    </div>
</nav>