<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid col-10 text-center mx-auto">

    <!-- Page Heading -->
    <div class="col">
        <div class="card mb-3">
            <h1 class="m-4">Profile Toko</h1>
            <div class="row g-0">
                    <div class="col-4">
                        <img src="<?= base_url('img/toko/' . $toko['foto']); ?>"
                            class="foto-user img-fluid img-profile rounded-circle  d-flex justify-content-center align-items-center p-5"
                            alt="<?= $toko['nama_toko']; ?>">
                    </div>
                    <div class="col-8">
                        <div class="card-body my-3">
                            <div class="card-body">
                                <table class="table mt-5">
                                    <tr>
                                        <td>Nama Toko</td>
                                        <td>:</td>
                                        <td><?= $toko['nama_toko']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Toko</td>
                                        <td>:</td>
                                        <td><?= $toko['alamat_toko']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Toko</td>
                                        <td>:</td>
                                        <td><?= $toko['deskripsi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No HP Toko</td>
                                        <td>:</td>
                                        <td><?= $toko['nohp_toko']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pemilik</td>
                                        <td>:</td>
                                        <td><?= $owner['fullname']; ?></td>
                                    </tr>
                                </table>
                                <a href="/toko/editProfile/<?= $toko['id_toko']; ?>" class="btn btn-primary">Edit Profile</a>
                                
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card-body -->
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->

        <?php if (session('success')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!!!',
                    text: '<?= session('success') ?>'
                });
            </script>
        <?php endif; ?>

        <?php if (session('error')): ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!!!',
                    text: '<?= session('error') ?>'
                });
            </script>
        <?php endif; ?>

        <?php if (session('warning')): ?>
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!!!',
                    text: '<?= session('warning') ?>'
                });
            </script>
        <?php endif; ?>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>