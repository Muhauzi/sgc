<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- show all informasi -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Informasi</h5>
                    <a href="/admin/tambahkan_info" class="btn btn-primary mb-3">Tambah Informasi</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($informasi as $info): ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i++; ?>
                                    </th>
                                    <td>
                                        <?= $info['judul']; ?>
                                    </td>
                                    <td>
                                        <?= $info['penulis']; ?>
                                    </td>
                                    <td>
                                        <?= $info['tanggal']; ?>
                                    </td>
                                    <td>
                                        <a href="/admin/detail_info/<?= $info['id_informasi']; ?>"
                                            class="btn btn-success">Detail</a>
                                        <a href="/admin/delete_info/<?= $info['id_informasi']; ?>"
                                            class="btn btn-danger" onclick="confirmDelete(event, '<?= base_url('admin/delete_info/' . $info['id_informasi']) ?>')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

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

        <script>
            //make function confirm before delete data
            function confirmDelete(event, url) {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus berita!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = url;
                    }
                })
            }
        </script>


        <?= $this->endSection(); ?>