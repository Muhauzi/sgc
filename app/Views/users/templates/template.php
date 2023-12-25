<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $title; ?>
    </title>

    <!-- Custom fonts for this template-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/css/main-styles.css" rel="stylesheet">

</head>

<body>

<header class="navbar navbar-expand sticky-top topbar pl-4 py-5">
    <div class="logo">
        <a href="<?= base_url(); ?>/admin">
            <img src="<?= base_url(); ?>/img/logoSGC[2].png" alt="Logo SGC" class="logo" width="90%" height="70%">
        </a>
    </div> <!-- /.logo -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
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
                <?php if ($user->inGroup('superadmin', 'admin')): ?>
                <div class="dropdown-item bg-fff-20">
                    <span class="fw-bold text-white">
                        <i class="fa-solid fa-list-check mr-3"></i>
                        Pesanan
                    </span>
                </div>
                <?php endif; ?>
                <div class="action-btn dropdown-item bg-white p-0 py-1 d-flex justify-content-between">
                    <span class="text-white ml-2">
                        <a href="<?= base_url('admin'); ?>" class="btn btn-sm bg-night text-white py-0" role="button">
                            Dashboard
                        </a>
                    </span>
                    
                    <span class="text-white mr-2">
                        <a class="btn btn-sm bg-night text-white py-0" href="" role="button" data-toggle="modal" data-target="#logoutModal">
                            Sign Out
                        </a>
                    </span>
                </div>
            </div> <!-- /.dropdown-menu -->
        </li>
    </ul>
</header>

    <?= $this->renderSection('content'); ?>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/07df810a55.js" crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>
</body>

</html>