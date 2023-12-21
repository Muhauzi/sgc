
            <?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
        <div class="card mb-3" style="max-width: 540px;">
                <form action="<?= base_url('admin/changeUserGroup') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="user_id">Pilih Pengguna</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <!-- Isi dropdown dengan daftar pengguna -->
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['id'] ?>">
                                    <?= $user['username'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="new_group_id">Pilih Grup Baru</label>
                        <select class="form-control" id="new_group_id" name="new_group_id" required>
                            <!-- Isi dropdown dengan daftar grup pengguna -->
                            <?php foreach ($groups as $group): ?>
                                <option value="<?= $group['id'] ?>">
                                    <?= $group['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Ubah Grup</button>
                </form>
            </div>


            
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>