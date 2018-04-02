<?php
/**
 * Created by nad.
 * Date: 26/03/2018
 * Time: 21:14
 * Description:
 */
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Persetujuan Sidang</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--berkas mahasiswa-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Mahasiswa Mengajukan<small></small></h2>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
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

                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tanggal Uji</th>
                            <th>Status</th>
                            <th>Detail</th>
                            <th>Plot Jadwal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($sidangInfo))
                        {
                            foreach($sidangInfo as $record)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $record->nim ?></td>
                                    <td><?php echo $record->nama ?></td>
                                    <td>
                                    <?php if ($record->tanggal!=null){?>
                                        <?php echo date_format(date_create_from_format('Y-m-d',$record->tanggal), 'd/m/Y'); ?>
                                    <?php }else{?>
                                        <span>-</span>
                                    <?php }?>
                                    </td>
                                    <?php if ($record->status == 'disetujui') {
                                        echo "<td><span class=\"label label-success\">" . $record->status . "</span></td>";
                                    } elseif ($record->status == 'pending') {
                                        echo "<td><span class=\"label label-warning\">" . $record->status . "</span></td>";
                                    } else {
                                        echo "<td><span class=\"label label-danger\">" . $record->status . "</span></td>";
                                    }
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url() ?>akademik/sidang/editOld/<?php echo $record->id_sidang?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    </td>
                                    <td>
                                        <?php if ($record->tanggal == null){?>
                                            <button class="btn btn-info" data-toggle="modal" data-target="#plot-jadwal<?php echo $record->id_sidang; ?>"><i class="fa fa-clock-o"></i></button>
                                        <?php }else{?>
                                            <button class="btn btn-info" data-toggle="modal" data-target="#plot-jadwal-edit<?php echo $record->id_sidang; ?>"><i class="fa fa-clock-o"></i></button>
                                        <?php }?>
                                    </td>
                                </tr>
                                <!--modal tambah-->
                                <div class="modal fade" id="plot-jadwal<?php echo $record->id_sidang; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                </button>
                                                <h3>Sidang Pendadaran</h3>
                                            </div>
                                            <div class="modal-body">
                                                <div class="x_panel">
                                                    <form id="tambah-pesan" action="<?php echo base_url()?>akademik/sidang/plot/<?php echo $record->id_sidang?>/<?php echo $record->id_mahasiswa?>" method="post" role="form" data-parsley-validate class="form-horizontal form-label-left">
                                                        <input type="hidden" name="id_sidang" value="<?php echo $record->id_sidang?>">
                                                        <div class="x_title">
                                                            <h2>Jadwal<small></small></h2>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="x_content">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Tanggal dan waktu
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                                        <div class='input-group date' id='myDatepicker2'>
                                                                            <input name="tanggal" id="tanggal" type='text' class="form-control"/>
                                                                            <span class="input-group-addon">
                                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                                        <div class='input-group date' id='myDatepicker3'>
                                                                            <input name="waktu" id="waktu" type='text' class="form-control"/>
                                                                            <span class="input-group-addon">
                                                                            <span class="glyphicon glyphicon-time"></span>
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Ruang
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                                        <input name="ruang" id="ruang" type='text' class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="x_title">
                                                            <h2>Anggota<small></small></h2>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="x_content">
                                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                                <label for="ketua">Ketua</label><small></small>
                                                                <input type="hidden" name="ketua" value="ketua">
                                                                <select class="form-control col-md-7 col-xs-12" id="nama-dosen" name="id_dosen_ketua">
                                                                    <option value="0" disabled selected>Pilih ..</option>
                                                                    <?php
                                                                    if(!empty($dosenInfo))
                                                                    {
                                                                        foreach ($dosenInfo as $dosen)
                                                                        {
                                                                            ?>
                                                                            <option value="<?php echo $dosen->id_dosen ?>"><?php echo $dosen->nama ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                                <label for="sekre">Sekretaris</label><small></small>
                                                                <input type="hidden" name="sekre" value="sekretaris">
                                                                <select class="form-control col-md-7 col-xs-12" id="nama-dosen" name="id_dosen_sekre">
                                                                    <option value="0" disabled selected>Pilih ..</option>
                                                                    <?php
                                                                    if(!empty($dosenInfo))
                                                                    {
                                                                        foreach ($dosenInfo as $dosen)
                                                                        {
                                                                            ?>
                                                                            <option value="<?php echo $dosen->id_dosen ?>"><?php echo $dosen->nama ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                                <label for="anggota">Dosen Pembimbing</label><small></small>
                                                                <input type="hidden" name="anggota" value="anggota">
                                                                <select name="id_nama_dosbing" class="form-control">
                                                                    <option value="<?php echo $record->id_dosen ?>" selected>
                                                                        <?php echo $record->nama_dosbing ?>
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12" style="margin-top: 5%">
                                                                <input type="submit" class="btn btn-primary pull-right" value="Submit">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!--                                end modal-->
                            <!--modal edit-->
                                <div class="modal fade" id="plot-jadwal-edit<?php echo $record->id_sidang; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                </button>
                                                <h3>Sidang Pendadaran</h3>
                                            </div>
                                            <div class="modal-body">
                                                <div class="x_panel">
                                                    <form id="tambah-pesan" action="<?php echo base_url()?>akademik/sidang/editPlot/<?php echo $record->id_sidang?>/<?php echo $record->id_mahasiswa?>" method="post" role="form" data-parsley-validate class="form-horizontal form-label-left">
                                                        <input type="hidden" name="id_sidang" value="<?php echo $record->id_sidang?>">
                                                        <div class="x_title">
                                                            <h2>Jadwal<small></small></h2>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="x_content">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Tanggal dan waktu
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                                        <div class='input-group date' id='myDatepicker4'>
                                                                            <input value="<?php echo date_format(date_create_from_format('Y-m-d',$record->tanggal), 'd/m/Y'); ?>" name="tanggal" id="tanggal-edit" type='text' class="form-control"/>
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                                        <div class='input-group date' id='myDatepicker5'>
                                                                            <input value="<?php echo substr($record->waktu,0,5)?>" name="waktu" id="waktu-edit" type='text' class="form-control"/>
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-time"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Ruang
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                                        <input value="<?php echo $record->ruang?>" name="ruang" id="ruang" type='text' class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="x_title">
                                                            <h2>Anggota<small></small></h2>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="x_content">
                                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                                <label for="ketua">Ketua</label><small></small>
                                                                <input type="hidden" name="ketua" value="ketua">
                                                                <select class="form-control col-md-7 col-xs-12" id="nama-dosen" name="id_dosen_ketua">
                                                                    <?php
                                                                    if(!empty($dosenInfo))
                                                                    {
                                                                        foreach ($dosenInfo as $dosen)
                                                                        {
                                                                            ?>
                                                                            <option value="<?php echo $dosen->id_dosen?>" <?php echo ($dosen->id_dosen == $ketuaInfo[0]->id_dosen) ? "selected=\"selected\"" : ""; ?>><?php echo $dosen->nama ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                                <label for="sekre">Sekretaris</label><small></small>
                                                                <input type="hidden" name="sekre" value="sekretaris">
                                                                <select class="form-control col-md-7 col-xs-12" id="nama-dosen" name="id_dosen_sekre">
                                                                    <?php
                                                                    if(!empty($dosenInfo))
                                                                    {
                                                                        foreach ($dosenInfo as $dosen)
                                                                        {
                                                                            ?>
                                                                            <option value="<?php echo $dosen->id_dosen?>" <?php echo ($dosen->id_dosen == $sekreInfo[0]->id_dosen) ? "selected=\"selected\"" : ""; ?>><?php echo $dosen->nama ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                                <label for="anggota">Dosen Pembimbing</label><small></small>
                                                                <input type="hidden" name="anggota" value="anggota">
                                                                <select name="id_nama_dosbing" class="form-control">
                                                                    <option value="<?php echo $record->id_dosen ?>" selected>
                                                                        <?php echo $record->nama_dosbing ?>
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12" style="margin-top: 5%">
                                                                <input type="submit" class="btn btn-primary pull-right" value="Submit">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--                                end modal-->
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- moment -->
<script src="<?php echo base_url(); ?>elusistatic/vendors/moment/min/moment.min.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?php echo base_url(); ?>elusistatic/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $('#myDatepicker2').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#myDatepicker3').datetimepicker({
        format: 'HH:mm'
    });
    $('#myDatepicker4').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#myDatepicker5').datetimepicker({
        format: 'HH:mm'
    });
</script>