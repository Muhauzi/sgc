<?= $this->extend('auth/template/template'); ?>

<?= $this->section('content') ;?>

    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card overflow-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="title text-gray-900 mb-4"><?=lang('Auth.register')?></h1>
                                    </div>

                                    <form class="user" action="<?= url_to('register') ?>" method="post">
                                    <?= csrf_field() ?>
                                        
                                        <!-- Email -->
                                        <div class="input-group border-0 mb-3">
                                            <span class="input-group-text border-0" id="icon"><i class="fa-solid fa-envelope"></i></span>
                                            <input type="email" class="form-control form-control-user border-0 <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                                        </div>
                                        
                                        <!-- Username -->
                                        <div class="input-group border-0 mb-3">
                                            <span class="input-group-text border-0" id="icon"><i class="fa-solid fa-user"></i></span>
                                            <input type="text" class="form-control form-control-user border-0 <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                                        </div>

                                        <!-- Password -->
                                        <div class="input-group border-0 mb-3">
                                            <span class="input-group-text border-0" id="icon"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control form-control-user border-0 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                            <span class="input-group-text border-0" id="icon"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="password_confirm" class="form-control form-control-user border-0 <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.passwordConfirm') ?>" autocomplete="off">
                                        </div>

                                        <div class="btn-login d-flex justify-content-center mt-4 mb-4">
                                            <button type="submit" class="btn btn-primary btn-user btn-block" id="btn-submit">
                                                <?=lang('Auth.register')?>
                                            </button>
                                        </div>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center mb-3">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                    <a href="<?= url_to('login') ?>"><p><?=lang('Auth.alreadyRegistered')?> <?=lang('Auth.signIn')?></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
<?= $this->endSection() ;?>
    
