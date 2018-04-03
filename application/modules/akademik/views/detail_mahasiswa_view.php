<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>
                    <a href="<?php echo base_url() ;?>akademik/daftar_mahasiswa">
                        <i class="fa fa-chevron-left"></i>
                    </a> &nbsp;Daftar Mahasiswa
                </h4>
            </div>
            <?php // var_dump($dataBerkasSidang) ?>
            <div class="clearfix"></div>

            <div class="col-md-4">
                <?php
                        $this->load->helper('form');
                        $error = $this->session->flashdata('error');
                        if($error)
                        {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                    <?php } ?>
                    <?php  
                        $success = $this->session->flashdata('success');
                        if($success)
                        {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php } ?>
            </div>
            <div role="main">
                <div class="x_content">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Profil Mahasiswa</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <div class="profile_left">
                                        <div class="profile_img">
                                            <div id="crop-photo">
                                                <!-- Current avatar -->
                                                <img class="img-responsive avatar-view img-circle" style="height: 200px; width: 200px"  onerror="this.src='<?php echo base_url(); ?>elusistatic/build/images/default.jpg'" src="<?php echo base_url() . 'uploads/foto/mahasiswa/' . $dataMahasiswa[0]->foto ?>" alt="Avatar" title="Change the avatar">
                                            </div>
                                        </div>
                                        <h3><?php echo $dataMahasiswa[0]->nama; ?></h3>

                                        <ul class="list-unstyled user_data">
                                            <li class="m-top-xs">
                                                <strong>NIM : </strong>
                                                <?php echo $dataMahasiswa[0]->nim; ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-briefcase user-profile-icon"></i> Mahasiswa
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--tab panel-->
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="col-md-12">
                                <div class="x_panel">

                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Identitas Diri</a>
                                            </li>
                                            <li role="presentation" class="">
                                                <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Tugas Akhir </a>
                                            </li>
                                            <li role="presentation" class="">
                                                <a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Berkas Sidang</a>
                                            </li>
                                            <li role="presentation" class="">
                                                <a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Penilaian</a>
                                            </li>
                                            <li role="presentation" class="">
                                                <a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Berkas Yudisium</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                                <!-- start detail profile-->
                                                <div class="x_title">
                                                    <h3>Detail Profil</h3>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-2">
                                                        <label>IPK</label>
                                                        <h5><?php echo $dataMahasiswa[0]->ipk; ?></h5>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>SKS</label>
                                                        <h5><?php echo $dataMahasiswa[0]->jumlah_SKS; ?></h5>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Email</label>
                                                        <h5><?php echo $dataMahasiswa[0]->email; ?></h5>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>HP</label>
                                                        <h5><?php echo $dataMahasiswa[0]->mobile; ?></h5>
                                                    </div>
                                                    <div class="profile_left">
                                                        <label>
                                                            <h5>
                                                                <i class="fa fa-user"></i>
                                                                <strong>Nama Lengkap</strong>
                                                            </h5>
                                                        </label>
                                                        <h5><?php echo $dataMahasiswa[0]->nama; ?></h5>
                                                        <hr>
                                                        <label>
                                                            <h5>
                                                                <strong>NIM</strong>
                                                            </h5>
                                                        </label>
                                                        <h5><?php echo $dataMahasiswa[0]->nim; ?></h5>
                                                        <hr>
                                                        <label>
                                                            <h5>
                                                                <strong>KEAHLIAN</strong>
                                                            </h5>
                                                        </label>
                                                        <h5>
                                                            <?php echo $dataMahasiswa[0]->skill; ?>
                                                        </h5>
                                                        <hr>
                                                        <label>
                                                            <h5>
                                                                <strong>PENGALAMAN</strong>
                                                            </h5>
                                                        </label>
                                                        <h5>
                                                            <span><?php echo $dataMahasiswa[0]->pengalaman; ?></span>
                                                        </h5>
                                                        <br>
                                                    </div>
                                                </div>
                                                <!-- end detail profile -->
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                <!-- start detail profile-->
                                                <div class="x_title">
                                                    <h3>Tugas Akhir</h3>
                                                </div>
                                                <div class="x_content">
                                                    <div class="profile_left">
                                                        <label>
                                                            <h5>
                                                                <i class="fa fa-user"></i>
                                                                <strong>Dosen Pembimbing</strong>
                                                            </h5>
                                                        </label>
                                                        <h5><?php echo ($dataDosbing != NULL ? $dataDosbing[0]->nama : '<i>Belum ada dosen pembimbing</i>')?></h5>
                                                        <hr>
                                                        <label>
                                                            <h5>
                                                                <strong>Judul Proyek</strong>
                                                            </h5>
                                                        </label>
                                                        <h5><?php echo $dataJudulTA[0]->judul_ta ?></h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <!-- end detail profile -->
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <!--table nilai-->
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr bgcolor="#67CEA6" style="color: white">
                                                                <th colspan="4">
                                                                    <h4>
                                                                        <strong>Berkas Sidang</strong>
                                                                    </h4>
                                                                </th>
                                                            </tr>
                                                            <tr bgcolor="#59BD96" style="color: white">
                                                                <th>No</th>
                                                                <th>Berkas</th>
                                                                <th>Status</th>
                                                                <th>Lihat</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                $i=1;
                                                                foreach($dataBerkasSidang as $data) { 
                                                            ?>

                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <th><?php echo $data->nama_berkas ?></th>
                                                                <td>
                                                                    <?php   
                                                                        if($data->isValid == 0) {
                                                                            echo 'Belum diupload'; 
                                                                        } elseif($data->isValid == 1) {
                                                                            echo 'Proses';
                                                                        } elseif($data->isValid == 2) {
                                                                            echo 'Disetujui';
                                                                        } elseif($data->isValid == 3) {
                                                                            echo 'Ditolak';
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url()?>uploads/sidang/<?php echo $data->id_berkas_sidang . '/' . $data->path ?>" class="btn btn-sm btn-info" target="_blank">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php $i++; } ?>
                                                            
                                                        </tbody>
                                                    </table>
                                                    <!--end table nilai-->
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                                <div class="col-md-6">
                                                    <!--table nilai-->
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr bgcolor="#67CEA6" style="color: white">
                                                                <th colspan="4">
                                                                    <h4>
                                                                        <strong>Data Penilaian</strong>
                                                                    </h4>
                                                                </th>
                                                            </tr>
                                                            <tr bgcolor="#59BD96" style="color: white">
                                                                <th>No</th>
                                                                <th>Subject</th>
                                                                <th>Nilai</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <th>Tata Tulis</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <th>Bahasa</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <th>Kesesuaian Naskah dengan Rancangan</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <th>Rancangan Masalah</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <th>Tujuan</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <th>Inovasi</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <th>Penguasaan Metode</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <th>Penguasaan Analisis</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <th>Presentasi</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <th>Kesimpulan</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--end table nilai-->
                                                </div>
                                                <center>
                                                    <div class="col-md-6">
                                                        <h5>Nilai Akhir</h5>
                                                        <h1>
                                                            <strong>A / B</strong>
                                                        </h1>
                                                    </div>
                                                </center>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                                <div class="col-md-6">
                                                    <!--table nilai-->
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr bgcolor="#67CEA6" style="color: white">
                                                                <th colspan="4">
                                                                    <h4>
                                                                        <strong>Data Penilaian</strong>
                                                                    </h4>
                                                                </th>
                                                            </tr>
                                                            <tr bgcolor="#59BD96" style="color: white">
                                                                <th>No</th>
                                                                <th>Subject</th>
                                                                <th>Nilai</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <th>Tata Tulis</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <th>Bahasa</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <th>Kesesuaian Naskah dengan Rancangan</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <th>Rancangan Masalah</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <th>Tujuan</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <th>Inovasi</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <th>Penguasaan Metode</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <th>Penguasaan Analisis</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <th>Presentasi</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <th>Kesimpulan</th>
                                                                <td>3.45</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--end table nilai-->
                                                </div>
                                                <center>
                                                    <div class="col-md-6">
                                                        <h5>Nilai Akhir</h5>
                                                        <h1>
                                                            <strong>A / B</strong>
                                                        </h1>
                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--tab panel-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->