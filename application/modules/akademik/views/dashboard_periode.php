<?php 
if($dataPeriode != FALSE) {
    $id_periode = $dataPeriode[0]->id_periode;
    $status_yudisium = $dataPeriode[0]->status_yudisium;
    $status_ta = $dataPeriode[0]->status_ta;
    $tahun_ajaran = $dataPeriode[0]->tahun_ajaran;
    
    $thn1 = explode('/',$tahun_ajaran)[0];
    $thn2 = explode('/',$tahun_ajaran)[1];

    $semester = $dataPeriode[0]->semester;


    if($semester == 'ganjil'){
        $next_semester = 'genap';
        $next_tahun_ajaran = $tahun_ajaran;
    } else {
        $next_semester = 'ganjil';
        $thn1 = $thn2;
        $thn2 = $thn2 + 1;
        $next_tahun_ajaran = $thn1 . '/' . $thn2;
    }
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> Periode Registrasi
                </h2>
                <div class="clearfix"></div>
            </div>
            <?php //var_dump($dataPeriode) ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
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

            <?php if($dataPeriode != FALSE) {?>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <center>
                        <p>
                            <h3>Periode Semester
                                <span>
                                    <strong>
                                        <?php echo ucfirst($dataPeriode[0]->semester) . " " . $dataPeriode[0]->tahun_ajaran ?>
                                    </strong>
                                </span>
                            </h3>
                        </p>
                        <p>
                            <i>
                                <?php echo DateTime::createFromFormat('Y-m-d', date('Y-m-d'))->format('j F Y'); ?>
                            </i>
                        </p>
                    </center>
                    <!-- <a href="<?php //echo base_url() ?>akademik/periode/ubah_periode" class="btn btn-default pull-right">
                        <i class="fa fa-clock-o"></i> Ganti Periode</button>
                    </a> -->
                    <a  data-toggle='modal' data-target="#modalGanti" class="btn btn-default pull-right">
                        <i class="fa fa-clock-o"></i> Ganti Periode</button>
                    </a>

                   
                </div>
            </div>
            <?php }  else { ?>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <center>
                        <p>
                            <h3>Belum ada data periode</h3>
                        </p>
                        <p>
                            <i>
                                <?php echo DateTime::createFromFormat('Y-m-d', date('Y-m-d'))->format('j F Y'); ?>
                            </i>
                        </p>
                    </center>
                    <a href="<?php echo base_url() ?>akademik/periode/ubah_periode" class="btn btn-default pull-right">
                        <i class="fa fa-clock-o"></i> Mulai Periode</button>
                    </a>
                </div>
            </div>
            <?php } ?>


            <?php if($dataPeriode != FALSE) {?>
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_content">
                        <center>
                            <h2>
                                <strong>TUGAS AKHIR</strong>
                            </h2>
                            <div class="x_title">
                                <div class="clearfix"></div>
                            </div>
                            <h4 style="margin-top:20%">Status Registrasi :</h4>
                            <?php if($status_ta == 1 ) { ?>
                            <h1>
                                <span class="label label-success">Aktif</span>
                            </h1>
                            <?php } else { ?>
                            <h1>
                                <span class="label label-default">Tidak aktif</span>
                            </h1>
                            <?php } ?>
                            <h4 style="margin-top:20%">Ubah Status Registrasi :</h4>
                            <?php if($status_ta == 0 ) { ?>
                            <a href="<?php echo base_url() . 'akademik/periode/change_status/'. $id_periode .'/ta/1'?>" class="btn btn-success btn-sm">
                                <i class="fa fa-check"></i> Aktifkan</button>
                            </a>
                            <?php } else { ?>
                            <a href="<?php echo base_url() . 'akademik/periode/change_status/'. $id_periode .'/ta/0'?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-close"></i> Nonaktifkan</button>
                            </a>
                            <?php } ?>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_content">
                        <center>
                            <h2>
                                <strong>YUDISIUM</strong>
                            </h2>
                            <div class="x_title">
                                <div class="clearfix"></div>
                            </div>
                            <h4 style="margin-top:20%">Status Registrasi :</h4>
                            <?php if($status_yudisium == 1 ) { ?>
                            <h1>
                                <span class="label label-success">Aktif</span>
                            </h1>
                            <?php } else { ?>
                            <h1>
                                <span class="label label-default">Tidak aktif</span>
                            </h1>
                            <?php } ?>
                            <h4 style="margin-top:20%">Ubah Status Registrasi :</h4>
                            <?php if($status_yudisium == 0 ) { ?>
                            <a href="<?php echo base_url() . 'akademik/periode/change_status/'. $id_periode .'/yudisium/1'?>" class="btn btn-success btn-sm">
                                <i class="fa fa-check"></i> Aktifkan</button>
                            </a>
                            <?php } else { ?>
                            <a href="<?php echo base_url() . 'akademik/periode/change_status/'. $id_periode .'/yudisium/0'?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-close"></i> Nonaktifkan</button>
                            </a>
                            <?php } ?>
                        </center>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalGanti" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ganti Periode</h4>
            </div>
            <div class="modal-body">
                <p><h5>Apakah anda yakin ingin merubah periode menjadi <br><br><strong><?php echo 'Tahun Ajaran ' . $next_tahun_ajaran . " Semester " . ucfirst($next_semester); ?>?</strong><h5></p>
            </div>
            <div class="modal-footer">
                <form action="<?php echo base_url() . 'akademik/periode/add_edit_period' ?>" method="post">
                    <input type="hidden" name="semester" id="semester" value="<?php echo $next_semester; ?>">
                    <input type="hidden" name="tahun_ajaran" id="tahun_ajaran" value="<?php echo $next_tahun_ajaran; ?>">
                    <button type="submit" class="btn btn-primary">Ganti</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- /page content -->