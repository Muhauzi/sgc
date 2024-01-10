<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col">
        <div class="card mb-3">
            <h1 class="m-4" >Edit Profile</h1>
            <div class="row g-0">
                <div class="col-4">
                    
                    <img src="<?= base_url('/img/profile/' . $user->user_image); ?>"
                        class="foto-user img-fluid img-profile rounded-circle  d-flex justify-content-center align-items-center p-5" alt="<?= $user->username; ?>">
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <div class="card-body">
                            <form action="/user/update" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= user_id() ?>">

                                <label for="username">Username</label>
                                <input class="form-control" type="text" id="username" name="username"
                                    value="<?= $user->username ?>">

                                <label for="fullname">Full Name</label>
                                <input class="form-control" type="text" id="fullname" name="fullname"
                                    value="<?= $user->fullname ?>">

                                <label for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    value="<?= $user->email ?>">

                                <label for="password">Password (leave blank to keep the same)</label>
                                <input class="form-control" type="password" id="password" name="password">

                                <label for="user_image">Profile Image (leave blank to keep the same)</label>
                                <input class="form-control" type="file" id="user_image" name="user_image">

                                <input class="btn btn-success mt-2" type="submit" value="Update User"> | <a
                                    href="<?= base_url('/admin/show/' . $user->id) ?>"
                                    class="btn btn-primary mt-2">Back</a>
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
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card-body -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.card -->
    </div> <!-- /.col -->
</div> <!-- /.container-fluid -->

<?= $this->endSection(); ?>