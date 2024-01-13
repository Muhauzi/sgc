<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<!-- tambah produk -->
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-4 text-gray-800">Tambah Produk</h1>
        </div>
        <div class="card-body">
            <form action="/toko/simpanProduk" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <!-- Nama Produk -->
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                </div>
                <div class="form-group">
                    <!-- Harga Produk -->
                    <label for="harga_produk">Harga Produk (Rp)</label>
                    <input type="number" class="form-control" id="harga_produk" name="harga_produk">
                </div>
                <div class="form-group">
                    <!-- stok produk -->
                    <label for="stok_produk">Stok Produk</label>
                    <input type="number" class="form-control" id="stok_produk" name="stok_produk">
                </div>
                <div class="form-group">
                    <!-- foto produk -->
                    <label for="foto_produk">Foto Produk</label>
                    <div class="custom-file">
                        <input type="file" class="image-file-input" id="foto_produk" name="foto_produk" accept=".jpg, .jpeg, .png, .svg"
                            onchange="previewImage(event)">
                        <label class="custom-file-label" for="foto_produk">Pilih Foto</label>
                    </div>
                    <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">

                </div>
                <div class="form-group">
                    <!-- deskripsi produk -->
                    <label for="deskripsi_produk">Deskripsi Produk</label>
                    <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3"></textarea>
                </div>
                <!-- Add more form fields if needed -->
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('toko/listProduk'); ?>" class="btn btn-secondary">Kembali</a>
                
            </form>
        </div>
    </div>
</div>

</form>
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

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?= $this->endSection(); ?>