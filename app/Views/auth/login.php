<?= $this->extend('auth/template/template'); ?>

<?= $this->section('content'); ?>

<div class="container position-absolute top-50 start-50 translate-middle">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card overflow-hidden border-0 shadow-lg">
                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-4">
                                <div class="text-center">
                                    <h1 class="title text-gray-900 fw-bold mb-3">SGCommunity</h1>

                                    <h1 class="subtitle text-gray-900 fw-light">Welcome!</h1>
                                    <img src="<?= base_url('../img/logoSGC.png') ?>" alt="Logo SGC" class="logo">
                                </div>
                                <form class="user" action="<?= url_to('login') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <?php if (session('message') !== null): ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session('message') ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if (session('error') !== null) : ?>
                                        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                                    <?php elseif (session('errors') !== null) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php if (is_array(session('errors'))) : ?>
                                                <?php foreach (session('errors') as $error) : ?>
                                                    <?= $error ?>
                                                    <br>
                                                <?php endforeach ?>
                                            <?php else : ?>
                                                <?= session('errors') ?>
                                            <?php endif ?>
                                        </div>
                                    <?php endif ?>

                                    <!-- Username/Email -->
                                    <div class="input-group border-0 mb-3">
                                        <span class="input-group-text border-0" id="icon"><i
                                                class="fa-solid fa-user"></i></span>
                                        <input type="text" class="form-control form-control-user border-0" name="username"
                                            placeholder="<?= lang('Auth.username') ?>">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="input-group border-0 mb-3">
                                        <span class="input-group-text border-0" id="icon"><i
                                                class="fa-solid fa-lock"></i></span>
                                        <input type="password" name="password"
                                            class="form-control border-0 form-control-user" placeholder="<?= lang('Auth.password') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>

                                    <div class="btn-login d-flex justify-content-center mt-4 mb-4">
                                        <button type="submit" class="btn btn-primary btn-user btn-block"
                                            id="btn-submit">
                                            <?= lang('Auth.login') ?>
                                        </button>
                                    </div>

                                </form>
                                <hr>
                                <div class="text-center">
                                </div>
                                <div class="text-center">
                                </div>
                                <p class="text-center">
                                    Made by Kelompok 3
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>