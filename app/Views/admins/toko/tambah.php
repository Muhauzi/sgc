<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Toko</h1>
    <div class="row">
        <div class="col-md-8">
            <form class="user" action="/Admin/tambah_toko" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="nama_toko">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="alamat_toko">
                </div>
                <div class="form-group">
                    <label for="owner">Owner</label>
                    <select name="idPemilik" id="owner" class="form-select form-control-user">
                        <?php foreach ($users as $user): ?>
                            <option value="<?= $user->id; ?>">
                                <?= $user->fullname; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nohp">Nomor Telepon Toko</label>
                    <input type="number" class="form-control form-control-user" name="nohp_toko">
                </div>


                <button type="submit" class="btn btn-primary btn-user btn-block">
                    <?= lang('Auth.register') ?>
                </button>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>