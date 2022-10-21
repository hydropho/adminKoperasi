<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dompet : Payment Admin Template">
    <meta property="og:title" content="Dompet : Payment Admin Template">
    <meta property="og:description" content="Dompet : Payment Admin Template">
    <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title><?= $title ?></title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets') ?>/images/favicon.png">
    <link href="<?= base_url('assets') ?>/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <img src="<?= base_url('assets') ?>/images/logo-full.png" alt="">
                                    </div>
                                    <h4 class="text-center mb-4">Daftar</h4>
                                    <form action="<?= base_url('auth/register') ?>" method="POST">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Nama Lengkap</strong></label>
                                            <?php if (set_value('nama_lengkap')) : ?>
                                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= set_value('nama_lengkap') ?>">
                                            <?php else : ?>
                                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
                                            <?php endif; ?>
                                            <?php if (form_error('nama_lengkap')) : ?>
                                                <?= form_error('nama_lengkap', '<div class="invalid-feedback-active">', '</div>') ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <?php if (set_value('username')) : ?>
                                                <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
                                            <?php else : ?>
                                                <input type="text" class="form-control" name="username" id="username">
                                            <?php endif; ?>
                                            <?php if (form_error('username')) : ?>
                                                <?= form_error('username', '<div class="invalid-feedback-active">', '</div>') ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="mb-1"><strong>Password</strong></label>
                                                <input type="password" class="form-control" name="password1" id="password1">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="mb-1"><strong>Konfirmasi Password</strong></label>
                                                <input type="password" class="form-control" name="password2" id="password2">
                                            </div>
                                            <?php if (form_error('password1')) : ?>
                                                <?= form_error('password1', '<div class="invalid-feedback-active">', '</div>') ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Sudah punya akun? <a class="text-primary" href="index">Masuk</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets') ?>/vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/custom.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/dlabnav-init.js"></script>
</body>

</html>