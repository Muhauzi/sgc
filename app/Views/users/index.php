<?= $this->extend('users/templates/template') ;?>
<?= $this->section('content') ;?>

<!-- Main -->
<div class="main container-fluid px-0">

    <div class="row">

        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column align-items-stretch flex-shrink-0 col-2 p-0 bg-body-tertiary">
            <!-- Card Header -->
            <div class="list-header d-flex justify-content-center align-items-center flex-shrink-0 p-3">
                <h3>Daftar Toko</h3>
            </div> <!-- /.list-header -->

            <!-- Card List -->
            <div class="list-group list-group-flush border-bottom scrollarea">
                <!-- Card -->
                <?php foreach ($tokos as $toko): ?>
                    <div class="store card my-3 mx-4 border border-dark">
                        <a href="<?= base_url('index.php'); ?>?id_toko=<?= $toko['id_toko']; ?>" role="button" class="toggleCard">
                            <div class="row g-0">
                                <div class="card-img col-4">
                                    <img src="<?= base_url(); ?>/img/<?= $toko['foto']; ?>" alt="image toko">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $toko['nama_toko']; ?></h5>
                                        <p class="card-text lh-sm">+62<?= $toko['nohp_toko']; ?></p>
                                        <p class="card-text lh-sm"><?= $toko['alamat_toko']; ?></p>
                                    </div> <!-- /.card-body -->
                                </div> <!-- /.col-md-8 -->
                            </div> <!-- /.row -->
                        </a>
                    </div>  <!-- /.card -->
                <?php endforeach; ?>

            </div>  <!-- /.list-group -->
        </div>  <!-- /.sidebar -->

        <!-- Content -->
        <main class="mx-auto col-8">
            <?php $id_toko = $_GET['id_toko'] ?? null; ?>

            <?php if (isset($id_toko)): ?>
            <div class="container-fluid pt-3 pb-2 mb-3 overflow-y-auto" id="product">
                <div class="column">
                    <div class="col text-black">
                        <h3 class="fw-bold">Daftar Produk</h3>
                        <?php foreach ($tokos as $toko): ?>
                            <?php if ($toko['id_toko'] === $id_toko): ?>
                                <p>Berikut daftar produk Toko <?= $toko['nama_toko']; ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <!-- Product -->
                    <div class="row justify-content-between mx-5">
                        <?php 
                        $hasProduct = false;
                        foreach ($produks as $product): 
                            if (isset($product['id_toko']) && $product['id_toko'] === $id_toko): 
                                $hasProduct = true;
                        ?>
                                <div class="product col-6 mb-3">
                                    <div class="card border border-dark">
                                        <div class="row">
                                            <div class="card-img col-4">
                                                <img src="<?= base_url(); ?>/img/<?= $product['foto_produk']; ?>" alt="image produk">
                                            </div> <!-- /.card-img -->
                                            <div class="card-body col-8">
                                                <h5 class="card-title"><?= $product['nama_produk']; ?></h5>
                                                <p class="card-text"><?= $product['tersedia'] ? 'Tersedia' : 'Stok Habis'; ?></p>
                                                <p class="card-text lh-sm">Rp. <?= $product['harga_produk']; ?>.000</p>
                                            </div> <!-- /.card-body -->
                                        </div> <!-- /.row -->
                                    </div> <!-- /.card -->
                                </div> <!-- /.product -->
                        <?php 
                        endif;
                        endforeach; 
                        if (!$hasProduct):
                        ?>
                            <p class="fw-bold text-black text-center">Toko ini tidak memiliki produk.</p>
                        <?php endif; ?>
                    </div>

                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->

            <?php else: ?>
            <!-- Greeting -->
            <div class="content container-fluid d-flex justify-content-around flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3" id="content">
                <div class="col-5">
                    <div class="row">
                        <h3 class="text-green">Halo, Selamat Datang!</h3>
                        <h2 class="text-black fw-bold">Mau beli apa hari ini?</h2>
                        <p class="text break">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas deserunt sed amet tenetur. Nostrum, esse.</p>
                    </div> <!-- /.row -->
                </div> <!-- /.col-lg-5 -->
                <div class="col-5">
                    <img src="<?= base_url(); ?>/img/logoSGC[1].png" alt="Logo SGC" class="img-logo img-fluid">
                </div> <!-- /.col-lg-4 -->
            </div> <!-- /.d-flex -->
            <?php endif; ?>
        </main> <!-- /.content -->

    </div> <!-- /.row -->

</div> <!-- /.container-fluid -->

<?= $this->endSection() ;?>