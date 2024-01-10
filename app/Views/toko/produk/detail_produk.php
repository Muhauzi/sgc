<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>


<!-- Begin Page Content -->
<!-- detail produk -->
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url('img/produk/' . $produk['foto_produk']); ?>" alt="<?= $produk['nama_produk']; ?>" class="img-thumbnail" style="width: 256px; height: 256px; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <h1 class="h3 mb-4 text-gray-800">Detail Produk</h1>
                        <table>
                            <tr>
                                <td>Nama Produk</td>
                                <td>:</td>
                                <td><?= $produk['nama_produk']; ?></td>
                            </tr>
                            <tr>
                                <td>Harga Produk</td>
                                <td>:</td>
                                <td><?= $produk['harga_produk']; ?></td>
                            </tr>
                            <tr>
                                <td>Stok Produk</td>
                                <td>:</td>
                                <td><?= $produk['stok_produk']; ?></td>
                            </tr>
                            <tr>
                                <td>Deskripsi Produk</td>
                                <td>:</td>
                                <td><?= $produk['deskripsi_produk']; ?></td>
                            </tr>
                        </table>
                        <div class="navbtn mt-5">
                        <a href="<?= base_url('toko/ubahProduk/' . $produk['id_produk']); ?>" class="btn btn-warning">Ubah</a> | 
                        <a href="<?= base_url('toko/listProduk'); ?>" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
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

<?= $this->endSection(); ?>