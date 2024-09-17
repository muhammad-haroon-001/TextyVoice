
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
          <a href="{{ route('home') }}" class="active">Home</a>

          <a href="{{ route('blog') }}" class="">Blogs</a>
          <a href="{{ route('EmdCustomPage.contact-us') }}" class="">Contact</a>
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
