<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <?php if(isset($pageTitle)){
        echo '<title>' . $pageTitle . '</title>';
    } else {
        echo '<title>TA</title>';
    }?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>elusistatic/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>elusistatic/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url()?>elusistatic/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?php echo base_url()?>elusistatic/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>elusistatic/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>elusistatic/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>elusistatic/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>elusistatic/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>elusistatic/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>elusistatic/build/css/customm.css" rel="stylesheet">
    <link href="<?php echo base_url()?>elusistatic/build/css/nilai.css" rel="stylesheet">

    <link href="<?php echo base_url()?>elusistatic/css/validation.css" rel="stylesheet">
    <script src="<?php echo base_url()?>elusistatic/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>elusistatic/js/jquery.validate.js"></script>

    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo base_url()?>dosen" class="site_title"><i class="fa fa-graduation-cap"></i> <span>KOMSI-TA</span></a>
                </div>
                <div class="clearfix"></div>
                <br />
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> <?php echo $this->session->userdata('name'); ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?php echo base_url(); ?>dosen/changepassword"><i class="fa fa-key pull-right"></i> Ubah Password</a></li>
                                <li><a href="<?php echo base_url();?>dosen/logout"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

