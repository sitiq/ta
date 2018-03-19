<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>e-Lusi </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>elusistatic/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>elusistatic/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url()?>elusistatic/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url()?>elusistatic/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url()?>elusistatic/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url()?>elusistatic/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url()?>elusistatic/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url()?>elusistatic/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url()?>elusistatic/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>elusistatic/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
<!--                <form>-->
                <form action="<?php echo base_url();?>login/loginMe" method="post">
                    <h1>LOGIN</h1>
                    <h5>Masukkan Username dan Password</h5>
                    <!--                    start of notif alert-->
                    <?php $this->load->helper('form'); ?>
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                    <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error; ?>
                        </div>
                    <?php }
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $success; ?>
                        </div>
                    <?php } ?>
                    <!--                    end of notif alert -->
                    <!--                    form login -->
                    <form action="<?php echo base_url();?>login/loginMe" method="post">
                        <div>
                            <input type="text" name="username" class="form-control" placeholder="Username" required />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required />
                        </div>
                        <div>
                            <input type="submit" class="btn btn-default submit btn-success" value="Log In" />
                            <a class="reset_pass" href="ubah.html">Lost your password?</a>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h3><i class="fa fa-graduation-cap"></i> Tugas Akhir KOMSI</h3>
                            <p>©2018 All Rights Reserved.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>