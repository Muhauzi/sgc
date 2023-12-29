<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="<?= base_url('/img/profile/' . $user->user_image); ?>"
                            class="foto-user img-fluid img-profile rounded-circle  d-flex justify-content-center align-items-center p-5" alt="<?= $user->username; ?>">
                    </div>
                    <div class="col-8">
                        <div class="card-body my-md-3">
                            <h2 class="text-center" >Informasi Pengguna</h2>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col">Username</th>
                                    <td>:</td>
                                    <td>
                                        <?= $user->username; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Nama Lengkap</th>
                                    <td>:</td>
                                    <td>
                                        <?= $user->fullname; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Email</th>
                                    <td>:</td>
                                    <td>
                                        <?= $user->email; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Role</th>
                                    <td>:</td>
                                    <td><span class="badge badge-<?= ($name == 'admin') ? 'success' : 'warning' ?>">
                                            <?= $name; ?>
                                        </span></td>
                                </tr>
                            </table>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-info mr-2" href="<?= base_url('admin/edit/' . $user->id); ?>">Edit</a>
                                <a href="<?= base_url('/admin'); ?>" class="btn btn-primary ml-2">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>