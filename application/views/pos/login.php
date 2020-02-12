<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KASIR | Login</title>

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            <img src="<?= base_url('assets/img/maktam.jpeg') ?>" width="40%"/>

            </div>
            <h3>Selamat Datang</h3>

            <p>Login Kasir </p>
            <form method="post" class="m-t" role="form" action="<?= base_url('pos/login/action') ?>">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <h2><?= $this->session->flashdata("message") ?></h2>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

</body>

</html>
