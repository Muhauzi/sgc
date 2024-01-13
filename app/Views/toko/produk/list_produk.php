<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">List Produk Toko</h1>
            <a class="btn btn-primary mb-3" href="/toko/tambahProduk">Tambah Produk</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga Produk</th>
                        <th scope="col">Stok Produk</th>
                        <th scope="col">Foto Produk</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php
                    $i = 1;
                    foreach ($produk as $row): ?>
                        <tr>
                            <td>
                                <?= $row['nama_produk']; ?>
                            </td>
                            <td>
                                <?= 'Rp ' . number_format($row['harga_produk'], 0, ',', '.'); ?>
                            </td>
                            <td>
                                <?= $row['stok_produk']; ?>
                            </td>
                            <td>
                                <img src="<?= base_url('img/produk/' . $row['foto_produk']); ?>"
                                    alt="<?= $row['nama_produk']; ?>" class="img-thumbnail"
                                    style="width: 128px; height: 128px; object-fit: cover;">
                            </td>
                            <td>
                                <a class="btn btn-info"
                                    href="<?= base_url('toko/detailProduk/' . $row['id_produk']); ?>">Detail</a> |
                                <a href="<?= base_url('toko/hapusProduk/' . $row['id_produk']); ?>" class="btn btn-danger"
                                    <a href="<?= base_url('toko/hapusProduk/' . $row['id_produk']); ?>"
                                    class="btn btn-danger"
                                    onclick="confirmDelete(event, '<?= base_url('toko/hapusProduk/' . $row['id_produk']); ?>')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> <!-- /.col -->
    </div> <!-- /.row -->
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
            confirmButtonText: 'Ya, Hapus Produk!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = url;
            }
        })
    }
</script>

<?= $this->endSection(); ?>