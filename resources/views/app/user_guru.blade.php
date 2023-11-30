
<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
        data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
            <img src="../assets/img/avatars/8.png" alt
                class="w-px-40 h-auto rounded-circle" />
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="#">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/8.png" alt
                                class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                        <small class="text-muted">{{ auth()->user()->email }}</small>
                    </div>
                </div>
            </a>
        </li>
        {{-- <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Settings</span>
            </a>
        </li> --}}
        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
        <div class="dropdown-item">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item" onclick="return confirm('anda yakin ingin logout ?')">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Logout</span></button>
                </form>
            </div>
        </li>
    </ul>
</li>