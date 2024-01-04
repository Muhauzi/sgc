<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card mb-3">
                <h1 class="ml-4 mt-4">Edit User</h1>
                <hr>
                <div class="row g-0">

                    <div class="col-4">
                        <img src="<?= base_url('/img/toko/' . $toko['foto']); ?>"
                            class="foto-user img-fluid img-profile rounded-circle  d-flex justify-content-center align-items-center p-5" alt="<?= $toko['nama_toko']; ?>">
                    </div>
                    <div class="col-8">
                        <div class="mr-4">
                            <form action="/admin/perbarui_toko" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $toko['id_toko'] ?>">

                                <label for="username" class="form-label">Username</label>
                                <input class="form-control" type="text" id="username" name="nama_toko"
                                    value="<?= $toko['nama_toko']; ?>">

                                <label for="email">Alamat</label>
                                <input class="form-control" type="text" id="email" name="alamat_toko"
                                    value="<?= $toko['alamat_toko']; ?>">

                                <label for="tlp">No Telepon</label>
                                <input class="form-control" type="text" id="tlp" name="telepon_toko" value="<?= $toko['nohp_toko']; ?>">
                                
                                <label for="user_image">Store Profile Image (leave blank to keep the same)</label>
                                <input class="form-control" type="file" id="user_image" name="foto" value="<?= $toko['foto']; ?>">

                                <label for="deskripsi">Deskripsi Toko</label>
                                <input class="form-control" type="textarea" name="deskripsi_toko" value=" <?= $toko['deskripsi'] ;?> ">
                                <label for="tlp">Owner</label>
                                <input class="form-control" type="text" id="tlp" name="owner" value="<?= $pemilik['user_id'] ?>">
                                
                                <div class="d-flex justify-content-end">
                                    <input class="btn btn-success my-4 mx-2" type="submit" value="Update User">
                                    <a href="<?= base_url('/admin/toko/detail/' . $toko['id_toko']) ?>"
                                        class="btn btn-primary my-4 mx-2">Back</a>
                                </div>
                            </form>

                            <?php if (session('error')): ?>
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!!!',
                                        text: '<?= session('error') ?>'
                                    });
                                </script>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->

    <?= $this->endSection(); ?>