<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3" style="max-width: 940px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('/img/profile/' . $user->user_image); ?>"
                            class="img-fluid img-profile rounded-circle my-xl-5 mx-md-4" alt="<?= $user->username; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body my-md-3">
                            <div class="card-body">
                                <form method="post" action="<?= base_url('admin/update'); ?>"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $user->id; ?>">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="<?= $user->username; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname"
                                            value="<?= $user->fullname; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?= $user->email; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="group" class="form-label">Group</label>
                                        <select class="form-control" id="group" name="group_id">
                                            <option value="superadmin" <?= ($info->group == 'superadmin') ? 'selected' : ''; ?>>Admin</option>
                                            <option value="pedagang" <?= ($info->group == 'pedagang') ? 'selected' : ''; ?>>
                                                Pedagang</option>
                                            <option value="user" <?= ($info->group == 'user') ? 'selected' : ''; ?>>
                                                User
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_image" class="form-label">User Image</label>
                                        <input type="file" class="form-control" id="user_image" name="user_image"
                                            accept=".jpg, .png, .jpeg, .svg">
                                    </div>
                                    <button class="btn btn-success" type="submit">Update</button> |
                                    <a class="btn btn-info" href="<?= base_url('admin/show/' . $user->id); ?>">Kembali</a>

                                </form>

                                <?php if (session('error')): ?>
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error!!!',
                                            text: '<?= session('error') ?>'
                                        });
                                    </script>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->

    <?= $this->endSection(); ?>