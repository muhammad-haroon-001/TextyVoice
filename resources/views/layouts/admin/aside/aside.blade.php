<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo me-1"></span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">EMD</span>
        </a>
    </div>
    <ul class="menu-inner py-1">
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
                <i class="menu-icon tf-icons mdi mdi-credit-card-outline"></i>
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
                    <a href="{{ route('Emd.blog.trash') }}" class="menu-link">
                        <div>Trash</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-cog-outline"></i>
                <div>Setting</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('setting-key.index') }}" class="menu-link">
                        <div>Setting Keys</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>