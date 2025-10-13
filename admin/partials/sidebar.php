<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'index.php') ? 'active' : ''; ?>" href="index.php">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'manage_users.php') ? 'active' : ''; ?>" href="manage_users.php">
                    <i class="bi bi-people-fill me-2"></i> Manage Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'manage_services.php') ? 'active' : ''; ?>" href="manage_services.php">
                    <i class="bi bi-heart-pulse-fill me-2"></i> Manage Services
                </a>
            </li>
            </ul>
    </div>
</nav>