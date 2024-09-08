<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme bg-white" id="layout-navbar" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)">
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto" style="margin-right: 30px">
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('assets/img/avatars/1.png') }}" class="w-px-40 h-auto rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                    <li>
                        <a class="dropdown-item pb-2 mb-1" href="javascript:void(0);">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2 pe-1">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">John Doe</h6>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i class="mdi mdi-account-outline me-1 mdi-20px"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i class='mdi mdi-power me-1 mdi-20px'></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>