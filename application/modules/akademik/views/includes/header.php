<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:31
 * Description:
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Elusi</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>elusistatic/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>elusistatic/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url()?>elusistatic/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url()?>elusistatic/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>elusistatic/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-graduation-cap"></i> <span>e-Lusi</span></a>
                </div>
                <div class="clearfix"></div>
                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Akademik</h3>
                        <ul class="nav side-menu">
                            <li><a href="berkas"><i class="fa fa-file-o"></i> Berkas</a></li>
                            <li><a><i class="fa fa-check"></i> Persetujuan <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a>Judul Proyek<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li class="sub_menu"><a href="judulBaru">Baru</a>
                                            </li>
                                            <li><a href="judulLama">Perpanjangan</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="listSidang">Sidang</a></li>
                                    <li><a href="listYudisium">Yudisium</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-calendar-o"></i>  Periode  <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="setPeriode">Tambah Periode</a></li>
                                    <li><a href="listPeriode">Daftar Periode</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
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
                                <i class="fa fa-user"></i>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?php echo base_url(); ?>mahasiswa/changepassword"><i class="fa fa-key pull-right"></i> Ubah Password</a></li>
                                <li><a href="<?php echo base_url();?>mahasiswa/logout"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

