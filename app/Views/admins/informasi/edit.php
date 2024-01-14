<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- edit informasi -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Edit Informasi</h5>
                    <form action="/admin/perbarui_info" method="POST" enctype="multipart/form-data">
                        <?php csrf_field(); ?>
                        <input type="hidden" name="id_informasi" value="<?= $informasi['id_informasi']; ?>">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="judul"
                                value="<?= $informasi['judul']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="isi"><?= $informasi['isi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="penulis"
                                value="<?= $informasi['penulis']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="foto">Gambar (leave blank to keep the same)</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>

<?= $this->endSection(); ?>