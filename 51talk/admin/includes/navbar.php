<!-- Top Header / Navbar -->
<header class="admin-header d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-3">
        <!-- Sidebar Toggle Buttons (Using generic 'button' type to prevent form issues) -->
        <button type="button" class="icon-btn d-none d-lg-flex" id="desktopSidebarToggle" title="Toggle Sidebar">
            <i class="bi bi-layout-sidebar-inset"></i>
        </button>
        <button type="button" class="icon-btn d-lg-none" id="mobileSidebarToggle" title="Open Menu">
            <i class="bi bi-list fs-5"></i>
        </button>

        <div class="search-box position-relative d-none d-sm-block" style="width: 260px;">
            <i class="bi bi-search"></i>
            <input type="text" class="form-control" placeholder="Search teacher, class ID...">
        </div>
    </div>

    <div class="d-flex align-items-center gap-2 gap-sm-3">

        <a href="chat.php" type="button" class="icon-btn" title="Chat">
            <i class="bi bi-chat-text"></i>
        </a>

        <!-- Theme Toggle -->
        <button type="button" class="icon-btn" id="themeToggleBtn" title="Toggle Theme">
            <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
        </button>

        <!-- Notifications -->
        <div class="dropdown">
            <button type="button" class="icon-btn" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell-fill"></i>
                <span class="badge-dot"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-3" style="width: 300px; border-radius: 16px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="fw-bold mb-0 text-main">Notifications</h6>
                    <span class="badge bg-primary rounded-pill">3 New</span>
                </div>
                <hr class="my-2">
                <div class="d-flex gap-2 py-2">
                    <i class="bi bi-person-plus-fill text-primary fs-5"></i>
                    <div>
                        <p class="mb-0 small fw-semibold text-main">New Application Submitted</p>
                        <span class="text-muted-custom small" style="font-size: 0.75rem;">Maria Santos • 5m ago</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Profile Dropdown -->
        <div class="dropdown ms-1">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-main" data-bs-toggle="dropdown">
                <img src="https://i.pravatar.cc/100?img=33" alt="Admin Avatar" class="rounded-circle avatar-img me-2">
                <div class="d-none d-md-block text-start me-2">
                    <div class="fw-bold fs-7 leading-tight">Admin User</div>
                    <div class="text-muted-custom small" style="font-size: 0.725rem;">Super Admin</div>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-2" style="border-radius: 16px;">
                <li><a class="dropdown-item rounded-3 py-2" href="profile.php"><i class="bi bi-person me-2"></i> Profile Settings</a></li>
                <li><a class="dropdown-item rounded-3 py-2 text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>