<!-- Topbar -->
<nav class="navbar navbar-expand bg-night topbar mb-4 static-top shadow">

<h2 class="text-white"><b><?= $title; ?></b></h2>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item topbar-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle show" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?= base_url(); ?>/img/profile/<?= auth()->user()->user_image; ?>">
                <span class="ml-3 d-none d-lg-inline text-white">
                    Halo, <?= auth()->user()->username; ?>!
                </span>
            </a>

            <!-- Dropdown - User Information -->
            <div class="dropdown-menu bg-night animated--grow-in py-0" aria-labelledby="userDropdown">

                <div class="container-fluid text-center text-white">
                    <div class="row justify-content-center">
                        <img src="<?= base_url(); ?>/img/profile/<?= auth()->user()->user_image; ?>" class="img-user img-profile rounded-circle my-3">
                        <p><?= auth()->user()->username; ?></p>
                        <p><?= auth()->user()->inGroup('superadmin', 'admin') ? 'Admin' : 'Customer'; ?></p>
                    </div>
                </div>

                <div class="dropdown-item bg-fff-20">
                    <span class="fw-bold text-white">
                        <i class="fa-solid fa-cart-shopping mr-3"></i>
                        Keranjang
                    </span>
                </div>
                <div class="action-btn dropdown-item bg-white p-0 py-1 d-flex justify-content-between">
                    <span class="text-white ml-2">
                        <a href="<?= base_url('dashboard'); ?>" class="btn btn-sm bg-night text-white py-0" role="button">
                            Dashboard
                        </a>
                    </span>
                    <span class="text-white mr-2">
                        <a class="btn btn-sm bg-night text-white py-0" href="/logout" role="button" data-toggle="modal" data-target="#logoutModal">
                            Sign Out
                        </a>
                    </span>
                </div>
            </div> <!-- /.dropdown-menu -->
        </li>
    </ul>

</nav>
<!-- End of Topbar -->