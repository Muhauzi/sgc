<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- detail informasi -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 m-3">
                        <img src="<?= base_url('/img/info/' . $informasi['foto']); ?>"
                            class="img-fluid rounded-start mt-md-2 " alt="<?= $informasi['judul']; ?>">
                        <br>
                        <div class="btnsection mt-3">
                            <a href="/admin/edit_info/<?= $informasi['id_informasi']; ?>"
                                class="btn btn-warning">Edit</a> |
                            <a href="/admin/info" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body max-width-content">
                            <h1>
                                <?= $informasi['judul'] ?>
                            </h1>
                            <h5>
                                <?= $informasi['penulis'] ?> |
                                <?= $informasi['tanggal'] ?>
                            </h5>
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