<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid col-10 text-center mx-auto">
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-4 text-gray-800">Kontak Admin</h1>
        </div>
        <div class="card-body">
            Silahkan Hubungi Admin jika ada kendala atau masalah
            <br>
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <th>Nomor Telepon (WA)</th>
                </tr>
                <?php foreach ($admin as $row): ?>
                    <tr>

                        <td>
                            <?= $row->fullname; ?>
                        </td>
                        <td>
                            <?= $row->nohp; ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <!-- javascript -->
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

</div> <!-- /.container-fluid -->

<?= $this->endSection(); ?>