<!DOCTYPE html>
<html>

<head>

    <?php 
        $username = $this->session->get_userdata('username');
        if($username['username'] == null){
            redirect('login');
        }
    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Aplikasi Stock | Dashboard</title>

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?= base_url() ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?= base_url() ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">


        <!-- orris -->
        <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">


    <link href="<?= base_url() ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    


</head>


<ul class="nav navbar-top-links navbar-right">

<li>
        <a style="color: #ffffff;" href="<?= base_url() ?>dashboard">
            <i class="fa fa-home" style="color: #ffffff;"></i> Home
        </a>
    </li>

    <li <?php 
            $username = $this->session->get_userdata('username');
            
            if(strpos($username['username'], 'admin') !== false){
                echo '';
            }else{
                echo 'style="display: none;"';
            }
    ?> >
        <a style="color: #ffffff;" href="<?= base_url() ?>dashboard/sellings">
            <i class="fa fa-dollar" style="color: #ffffff;"></i> Penjualan
        </a>
    </li>

    <li>
        <a style="color: #ffffff;" href="<?= base_url() ?>dashboard/logout">
            <i class="fa fa-sign-out" style="color: #ffffff;"></i> Log out
        </a>
    </li>
</ul>

<body style="background-color: #347ab7;">