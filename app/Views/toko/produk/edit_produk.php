<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>


<!-- Begin Page Content -->
<!-- edit produk -->

<!-- Form -->
<div class="container">

    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-4 text-gray-800">Edit Produk</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url('img/produk/' . $produk['foto_produk']); ?>" alt="Product Image" class="m-5" style="width: 256px; height: 256px; object-fit: cover;">
                <div class="actionBtn m-5 justify-content-center">
                <form action="/toko/editProduk" method="POST" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('toko/listProduk'); ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <!-- Nama Produk -->
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                value="<?= $produk['nama_produk']; ?>">
                        </div>
                        <div class="form-group">
                            <!-- Harga Produk -->
                            <label for="harga_produk">Harga Produk</label>
                            <input type="number" class="form-control" id="harga_produk" name="harga_produk"
                                value="<?= $produk['harga_produk']; ?>">
                        </div>
                        <div class="form-group">
                            <!-- stok produk -->
                            <label for="stok_produk">Stok Produk</label>
                            <input type="number" class="form-control" id="stok_produk" name="stok_produk"
                                value="<?= $produk['stok_produk']; ?>">
                        </div>
                        <div class="form-group">
                            <!-- foto produk -->
                            <label for="foto_produk">Foto Produk</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto_produk" name="foto_produk">
                                <label class="custom-file-label" for="foto_produk">Pilih Foto</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- deskripsi produk -->
                            <label for="deskripsi_produk">Deskripsi Produk</label>
                            <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk"
                                rows="3"><?= $produk['deskripsi_produk']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <!-- tersedia -->
                            <label for="tersedia">Tersedia</label>
                            <select class="form-control" id="tersedia" name="tersedia">
                                <option value="1" <?php if ($produk['tersedia'] == 1)
                                    echo 'selected'; ?>>Tersedia
                                </option>
                                <option value="0" <?php if ($produk['tersedia'] == 0)
                                    echo 'selected'; ?>>Tidak Tersedia
                                </option>
                        </div>
                        <!-- Add more form fields if needed -->

                    </form>
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