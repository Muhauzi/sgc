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
                <a href="store.php?id=<?= $toko['id_toko']; ?>" role="button" class="toggleCard">
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