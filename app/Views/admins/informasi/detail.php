<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- detail informasi -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('/img/info/' . $informasi['foto']); ?>"
                            class="img-fluid rounded-start mt-md-2 " alt="<?= $informasi['judul']; ?>">
                        <br>
                        <a href="/admin/edit_info/<?= $informasi['id_informasi']; ?>" class="btn btn-warning">Edit</a> |
                        <a href="/admin/info" class="btn btn-danger">Kembali</a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body max-width-content">
                            <h1>
                                <?= $informasi['judul'] ?>
                            </h1>
                            <h3>
                                <?= $informasi['penulis'] ?> |
                                <?= $informasi['tanggal'] ?>
                            </h3>
                            <hr>
                            <?= $informasi['isi'] ?>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>