<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo me-1">

            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">EMD V1</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        {{-- main menu --}}
        <li class="menu-item active">
            <a href="{{ route('Emd.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div>Dashboard</div>

            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-window-maximize"></i>
                <div>Tools</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div>Parent List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('Emd.tools') }}" class="menu-link">
                        <div>List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('Emd.tools.create') }}" class="menu-link">
                        <div>Add</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('Emd.tools.trash') }}" class="menu-link">
                        <div>Trash</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link menu-toggle">
                {{-- need icon for blog --}}
                <i class="menu-icon tf-icons mdi mdi-file"></i>
                <div>Custom Pages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('custom-page.index') }}" class="menu-link">
                        <div>List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('custom-page.create') }}" class="menu-link">
                        <div>Add</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div>Trash</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link menu-toggle">
                {{-- need icon for blog --}}
                <i class="menu-icon tf-icons mdi mdi-book"></i>
                <div>Blog</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('blog.index') }}" class="menu-link">
                        <div>List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('blog.create') }}" class="menu-link">
                        <div>Add</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('blog.index') }}" class="menu-link">
                        <div>Trash</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
