<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User Table</h1>
    <div class="row">
        <div class="col-12">
            <form class="user" action="/Admin/store" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <input type="email"
                        class="form-control form-control-user <?php if (session('errors.email')): ?>is-invalid<?php endif ?>"
                        name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>"
                        value="<?= old('email') ?>">
                </div>

                <div class="form-group">
                    <input type="text"
                        class="form-control form-control-user <?php if (session('errors.username')): ?>is-invalid<?php endif ?>"
                        name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                </div>

                
                <!-- New input for user group -->
                <div class="form-group">
                    <label for="user_group" class="form-label">User Group</label>
                    <select class="form-control" id="user_group" name="role">
                        <option value="admin">Admin</option>
                        <option value="pedagang">Pedagang</option>
                        <option value="user">Regular</option>
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        <input type="password" name="password"
                            class="form-control form-control-user <?php if (session('errors.password')): ?>is-invalid<?php endif ?>"
                            placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <input type="password" name="password_confirm"
                            class="form-control form-control-user <?php if (session('errors.pass_confirm')): ?>is-invalid<?php endif ?>"
                            placeholder="<?= lang('Auth.passwordConfirm') ?>" autocomplete="off">
                    </div>
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