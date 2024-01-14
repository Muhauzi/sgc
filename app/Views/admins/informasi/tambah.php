<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- form tambahkan informasi -->
    <div class="col-8">
        <div class="card mb-3">
            <div class="card-body p-3">
                <form class="" action="/Admin/tambah_info" method="post" enctype="multipart/form-data">
                    <?php csrf_field(); ?>
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="content">Isi</label>
                        <textarea class="form-control" id="content" name="isi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="author">Penulis</label>
                        <input type="text" class="form-control" id="author" name="penulis">
                    </div>
                    <div class="form-group">
                        <label for="foto">Gambar</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button> | 
                    <a href="/admin/info" class="btn btn-danger">Kembali</a>
                </form>
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

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>


<?= $this->endSection(); ?>