<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar User Mahasiswa
                </h2>
                <div class="clearfix"></div>
            </div>
            <?php //var_dump($dataTable)?><br><br>
            <?php //var_dump($nilai)?>
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
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Data Mahasiswa</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>No. HP</th>
                                            <th>Judul</th>
                                            <th>Sidang</th>
                                            <th>Nilai Akhir</th>
                                            <th>Yudisium</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataTable as $data) { ?>
                                            <tr>
                                                <td><?php echo $data['nim']?></td>
                                                <td><?php echo $data['nama']?></td>
                                                <td><?php echo $data['no_hp']?></td>
                                                <td>
                                                    <?php if($data['judul']) {?>
                                                        <span class="badge bg-green">
                                                            <i class="fa fa-check"></i>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-warning">
                                                            <i class="fa fa-minus"></i>
                                                        </span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if($data['sidang']) {?>
                                                        <span class="badge bg-green">
                                                            <i class="fa fa-check"></i>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-warning">
                                                            <i class="fa fa-minus"></i>
                                                        </span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if($data['nilai_akhir'] != FALSE || $data['nilai_akhir'] != 0 ) {
                                                            echo $data['nilai_akhir']; 
                                                          } else {
                                                            echo "-";
                                                          }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if($data['yudisium']) {?>
                                                        <span class="badge bg-green">
                                                            <i class="fa fa-check"></i>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-warning">
                                                            <i class="fa fa-minus"></i>
                                                        </span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>akademik/daftar_mahasiswa/detail_mahasiswa/<?php echo $data['id_mahasiswa']?>" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->