<?= $this->extend('users/templates/template'); ?>
<?= $this->section('content'); ?>

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
                <?php foreach ($toko as $row): ?>
                    <div class="store card my-3 mx-4 border border-dark">
                        <a href="<?= base_url('index.php'); ?>?id_toko=<?= $row['id_toko']; ?>" role="button"
                            class="toggleCard">
                            <div class="row g-0">
                                <div class="card-img col-4">
                                    <img src="<?= base_url(); ?>/img/toko/<?= $row['foto']; ?>" alt="image toko">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $row['nama_toko']; ?>
                                        </h5>
                                        <p class="card-text lh-sm">
                                            <?= $row['nohp_toko']; ?>
                                        </p>
                                        <p class="card-text lh-sm">
                                            <?= $row['alamat_toko']; ?>
                                        </p>
                                    </div> <!-- /.card-body -->
                                </div> <!-- /.col-md-8 -->
                            </div> <!-- /.row -->
                        </a>
                    </div> <!-- /.card -->
                <?php endforeach; ?>

            </div> <!-- /.list-group -->
        </div> <!-- /.sidebar -->

        <!-- Content -->
        <main class="mx-auto col-8">
            <?php $id_toko = $_GET['id_toko'] ?? null; ?>

            <?php if (isset($id_toko)): ?>
                <div class="container-fluid pt-3 pb-2 mb-3 overflow-y-auto" id="product">

                    <?php foreach ($toko as $row): ?>
                        <?php if ($row['id_toko'] === $id_toko): ?>
                            <div class="card">
                                <div class="row m-2">
                                    <div class="card-img col-3">
                                        <img src="<?= base_url(); ?>/img/toko/<?= $row['foto']; ?>" alt="foto toko"
                                            class="card-img-top" style="object-fit: cover; width: 256px; height: 256px;">
                                    </div> <!-- /.card-img -->
                                    <div class="card-body col-8 mt-5">
                                        <h3 class="card-title">
                                            <?= $row['nama_toko']; ?>
                                        </h3>
                                        <hr>
                                        <p>
                                            <?= $row['deskripsi']; ?>
                                        </p>
                                        <p class="card-text lh-sm">Alamat : 
                                            <?= $row['alamat_toko']; ?>
                                        </p>
                                        <p class="card-text lh-sm">No. HP : 
                                            <?= $row['nohp_toko']; ?>
                                    </div> <!-- /.card-body -->
                                </div> <!-- /.row -->
                                <hr>
                                <div class="column">

                                    <div class="col text-black mx-3 mt-3">
                                        <h3 class="fw-bold">Daftar Produk</h3>
                                        <?php foreach ($toko as $row): ?>
                                            <?php if ($row['id_toko'] === $id_toko): ?>
                                                <p>Berikut daftar produk Toko
                                                    <?= $row['nama_toko']; ?>
                                                </p>
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
                                                                <img src="<?= base_url(); ?>/img/produk/<?= $product['foto_produk']; ?>"
                                                                    alt="image produk">
                                                            </div> <!-- /.card-img -->
                                                            <div class="card-body col-8">
                                                                <h5 class="card-title">
                                                                    <?= $product['nama_produk']; ?>
                                                                </h5>
                                                                <span
                                                                    class="badge <?= $product['tersedia'] == 1 ? 'badge-success' : 'badge-danger'; ?>">
                                                                    <?= $product['tersedia'] == 1 ? 'Tersedia' : 'Stok Habis'; ?>
                                                                </span>
                                                                <p class="card-text lh-sm">Rp.
                                                                    <?= number_format($product['harga_produk'], 0, ',', '.'); ?>
                                                                </p>
                                                                <hr>   
                                                                <p class="card-text lh-sm">
                                                                    <?= $product['deskripsi_produk']; ?>
                                                            </div> <!-- /.card-body -->
                                                        </div> <!-- /.row -->
                                                    </div> <!-- /.card -->
                                                </div> <!-- /.product -->
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div> <!-- /.row -->
                                </div> <!-- /.column -->
                            </div> <!-- /.card -->
                        <?php endif; ?>
                    <?php endforeach; ?>



                </div> <!-- /.container-fluid -->
            <?php endif; ?>

        </main> <!-- /.mx-auto col-8 -->

    </div> <!-- /.row -->

</div> <!-- /.main -->


</div> <!-- /.container-fluid -->

<?= $this->endSection(); ?>