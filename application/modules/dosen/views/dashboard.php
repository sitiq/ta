<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:32
 * Description:
 */
var_dump($countBimbingan);
//var_dump($id);
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Dashboard</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <br>
    <center>
        <p><h3>Periode Semester <span><strong>Genap 2017/2018</strong></span></h3></p>
        <p><?php echo DateTime::createFromFormat('Y-m-d', date('Y-m-d'))->format('j F Y'); ?></i></p>
    </center>
    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-tasks"></i></div>
                <div class="count"><?php echo $countBimbingan ?></div>
                <h3>Bimbingan</h3>
                <p><a href="<?php echo base_url()?>dosen/bimbingan">Cek Mahasiswa Bimbingan <i class="fa fa-arrow-right"></i></a></p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count"><?php echo $countPendadaran ?></div>
                <h3>Pendadaran</h3>
                <p><a href="<?php echo base_url()?>dosen/pendadaran">Cek Mahasiswa akan Pendadaran</a> <i class="fa fa-arrow-right"></i></p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-line-chart"></i></div>
                <div class="count"><?php echo $countProyek ?></div>
                <h3>Project</h3>
                <p><a href="<?php echo base_url()?>dosen/proyek">Cek Daftar Project</a> <i class="fa fa-arrow-right"></i></p>
            </div>
        </div>
    </div>
</div>
