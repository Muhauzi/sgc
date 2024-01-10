<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SGcomunity <sup>Dashboard</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if (auth()->user()->inGroup('superadmin', 'admin')): ?>
        <li class="nav-item mx-3 text-white">
            <i class="fas fa-user-tie"></i>
            <span><b>Menu Admin</b></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-users"></i>
                <span>Menu Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/toko'); ?>">
                <i class="fas fa-users"></i>
                <span>Menu Toko</span></a>
        </li>
        <hr class="sidebar-divider">
    <?php endif; ?>



    <!-- Nav Item - Charts -->
    <li class="nav-item mx-3 text-white">
        <i class="fas fa-cirle-user"></i>
        <span><b>Menu Pengguna</b></span>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/profile'); ?>">
            <i class="fas fa-user"></i>
            <span>User Profile</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard/editprofile">
            <i class="fas fa-user-edit"></i>
            <span>Edit Profile</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-receipt"></i>
            <span>Pesanan Saya</span></a>
    </li>

    <!-- Divider -->
    <?php if (auth()->user()->inGroup('pedagang', 'superadmin')): ?>
        <hr class="sidebar-divider">
        <li class="nav-item mx-3 text-white">
            <i class="fas fa-store"></i>
            <span><b>Menu Pedagang</b></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/product'); ?>">
                <i class="fas fa-table-list"></i>
                <span>Pesanan Masuk</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/product'); ?>">
                <i class="fas fa-box"></i>
                <span>Kelola Produk</span></a>
        </li>
    <?php endif; ?>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/'); ?>">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span></a>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>