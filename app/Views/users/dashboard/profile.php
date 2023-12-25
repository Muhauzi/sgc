<?= $this->extend('templates/index') ;?>
<?= $this->section('content') ;?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('/img/profile/' . $user->user_image) ;?>" class="img-fluid rounded-start mt-md-2 " alt="<?= $user->username ;?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Username : <?= $user->username ;?></li>
                            <?php if($user->fullname): ?>
                                <li class="list-group-item">Fullname : <?= $user->fullname ;?></li>
                            <?php endif; ?>
                            <li class="list-group-item">Email : <?= $user->email ;?></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ;?>