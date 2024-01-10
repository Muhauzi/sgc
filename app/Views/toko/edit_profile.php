<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Profile Toko</h1>

    <form action="/toko/updateProfile" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $toko['id_toko']; ?>">
        <input type="hidden" name="user_id" value="<?= $toko['user_id']; ?>">
        <div class="form-group row">
            <label for="nama_toko" class="col-sm-2 col-form-label">Nama Toko</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('nama_toko')) ? 'is-invalid' : ''; ?>"
                    id="nama_toko" name="nama_toko" autofocus
                    value="<?= (old('nama_toko')) ? old('nama_toko') : $toko['nama_toko']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_toko'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat_toko" class="col-sm-2 col-form-label">Alamat Toko</label>
            <div class="col-sm-10">
                <input type="text"
                    class="form-control <?= ($validation->hasError('alamat_toko')) ? 'is-invalid' : ''; ?>"
                    id="alamat_toko" name="alamat_toko"
                    value="<?= (old('alamat_toko')) ? old('alamat_toko') : $toko['alamat_toko']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat_toko'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Toko</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>"
                    id="deskripsi" name="deskripsi"
                    value="<?= (old('deskripsi')) ? old('deskripsi') : $toko['deskripsi']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('deskripsi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="nohp_toko" class="col-sm-2 col-form-label">No HP Toko</label>
            <div class="col-sm-10">
                <input type="number"
                    class="form-control <?= ($validation->hasError('nohp_toko')) ? 'is-invalid' : ''; ?>" id="nohp_toko"
                    name="nohp_toko" value="<?= $toko['nohp_toko']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nohp_toko'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Foto Toko</label>
            <div class="col-sm-2">
                <img src="/img/toko/<?= $toko['foto']; ?>" class="img-thumbnail img-preview">
            </div>
            <div class="col-sm-8">
                <label for="toko_image">Profile Image (leave blank to keep the same)</label>
                <input class="form-control" type="file" id="toko_image" name="toko_image">
            </div>
        </div>
        .<div class="form-group row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit Profile</button> | <a href="/toko">Profile Toko</a>
            </div>
    </form>
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