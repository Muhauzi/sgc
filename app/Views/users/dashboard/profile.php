<?= $this->extend('templates/index') ;?>
<?= $this->section('content') ;?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('/img/profile/' . $user->user_image) ;?>" class="img-fluid rounded-start mt-md-2 " alt="<?= $user->username ;?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Username</th>
                                <th>:</th>
                                <td><?= $user->username ?></td>
                            </tr>
                            <?php if($user->fullname): ?>
                                <tr>
                                    <th>Fullname</th>
                                    <th>:</th>
                                    <td><?= $user->fullname ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <td><?= $user->email ?></td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <th>:</th>
                                <td><?= $user->nohp ?></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ;?>