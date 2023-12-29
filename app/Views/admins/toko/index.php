<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid col-10 text-center mx-auto">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Toko Table</h1>
    <a class="btn btn-primary mb-3" href="/Admin/tambahkan_toko">Daftarkan Toko</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>Nama Toko</th>
                        <th>Nama Pemilik</th>
                        <th>Alamat Toko</th>
                        <th>No HP Toko</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php
                    $i = 1;
                    foreach ($tokos as $row): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['nama_toko']; ?></td>
                            <td><?= $row['fullname']; ?></td>
                            <td><?= $row['alamat_toko']; ?></td>
                            <td>+62<?= $row['nohp_toko']; ?></td>
                            <td class="">
                                <a class="btn btn-info" href="<?= base_url('admin/showToko/' . $row['id']); ?>">Detail</a> |
                                <a href="<?= base_url('admin/deleteToko/' . $row['id']); ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus pengguna ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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