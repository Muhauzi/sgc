<?= $this->extend('users/templates/template'); ?>
<?= $this->section('content'); ?>

<!-- Main -->
<div class="main container-fluid px-0">
</div> <!-- /.main -->
<div class="row">
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column align-items-stretch flex-shrink-0 col-2 p-0 bg-body-tertiary">
        <!-- Card Header -->
        <div class="list-header d-flex justify-content-center align-items-center flex-shrink-0 p-3">
            <h3>Berita</h3>
        </div> <!-- /.list-header -->

        <!-- Card List -->
        <div class="list-group list-group-flush border-bottom scrollarea">
            <!-- Card -->
            <?php foreach ($informasi as $row): ?>
                <div class="store card my-3 mx-4 border border-dark">
                    <a href="<?= base_url('user/detailInfo/') . $row['id_informasi']; ?>" role="button">
                        <div class="row g-0 m-1">
                            <div class="card-img col-auto">
                                <img src="<?= base_url(); ?>/img/info/<?= $row['foto']; ?>" alt="image info" style="max-width: 256px;">
                            </div>
                            <div class="col-md-auto">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $row['judul']; ?>
                                    </h5>
                                    <p class="card-text lh-sm">
                                        <?= $row['penulis']; ?>
                                    </p>
                                    <p class="card-text lh-sm">
                                        <?= $row['tanggal']; ?>
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
        <div class="container-fluid pt-3 pb-2 mb-3 overflow-y-auto">
            <div class="card">
                <div class="card-header">
                        <h1><?= $infoDetail['judul']; ?> </h1>
                        <h5>
                            <?= $infoDetail['penulis']; ?> | <?= $infoDetail['tanggal']; ?>
                        </h5>
                        <hr>
                        <div class="card-img col-4">
                            <img src="<?= base_url(); ?>/img/info/<?= $infoDetail['foto']; ?>" alt="image info" width="800" height="800">
                        </div>
                        <p>
                            <?= $infoDetail['isi']; ?>
                        </p>
                </div>
            </div>
        </div>
    </main>

</div> <!-- /.container-fluid -->

<?= $this->endSection(); ?>