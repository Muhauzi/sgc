<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid col-md-8 text-center mx-auto">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User Table</h1>
    <a class="btn btn-primary mb-3" href="/Admin/create">Daftarkan Pengguna</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php
                    $i = 1;
                    foreach ($pengguna as $row): ?>
                        <tr>
                            <th scope="row">
                                <?= $i++; ?>
                            </th>
                            <td>
                                <?= $row->username; ?>
                            </td>
                            <td>
                                <?= $row->email; ?>
                            </td>
                            <td>
                                <?= implode(', ', $row->groups); ?>
                            </td>
                            <td>
                                <a class="btn btn-info" href="<?= base_url('admin/show/' . $row->id); ?>">Detail</a> | 
                                <a href="<?= base_url('admin/delete/' . $row->id); ?>" class="btn btn-danger"
                                    onclick="return confirm('Anda yakin ingin menghapus pengguna ini?')">Delete</a>
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