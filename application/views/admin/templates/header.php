<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>KASIR MAKTAM | Dashboard</title>

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?= base_url() ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?= base_url() ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">


    <link href="<?= base_url() ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">


</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="active">
                        <a href="<?= base_url() ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/penjualan"><i class="fa fa-dollar"></i> <span class="nav-label">Penjualan</span></a>
                    </li>

                    <li>
                        <a href="<?= base_url() ?>admin/penjualan/analisis"><i class="fa fa-line-chart"></i> <span class="nav-label">Analisis Penjualan</span></a>
                    </li>

                    <li>
                        <a href="<?= base_url() ?>admin/penjualan/rekap"><i class="fa fa-calendar"></i> <span class="nav-label">Rekap Harian</span></a>
                    </li>


                    <li>
                        <a href="<?= base_url() ?>admin/listsusu"><i class="fa fa-coffee"></i> <span class="nav-label">Susu</span></a>
                    </li>

                    <li>
                        <a href="<?= base_url() ?>admin/listproduklain/"><i class="fa fa-glass"></i> <span class="nav-label">Produk Lain</span></a>
                        
                    </li>

                    <li>
                        <a href="<?= base_url() ?>admin/outlet/"><i class="fa fa-user-circle"></i> <span class="nav-label">Outlet</span></a>
                    </li>

                    <!-- <li>
                        <a href="<?= base_url() ?>admin/login/changepassword/"><i class="fa fa-key"></i> <span class="nav-label">Ganti Password</span></a>
                    </li> -->
                    

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="grid_options.html">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                        <a href="<?= base_url() ?>admin/login">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>