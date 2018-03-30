<?php
/**
 * Created by nad.
 * Date: 26/03/2018
 * Time: 21:21
 * Description:
 */
//var_dump($berkasInfo);
//var_dump($yudisiumInfo);
?>
<?php
$id_berkas_yudisium = '';
$nama_berkas = '';
$id_valid_yudisium = '';
$isValid = '';
$path = '';
$id_yudisium = '';
$nim = '';
$nama = '';
$id_mahasiswa = '';

if(!empty($berkasInfo))
{
    foreach ($berkasInfo as $uf)
    {
        $id_berkas_yudisium = $uf->id_berkas_yudisium;
        $nama_berkas = $uf->nama_berkas;
        $id_valid_yudisium = $uf->id_valid_yudisium;
        $isValid = $uf->isValid;
        $path = $uf->path;
        $id_yudisium = $uf->id_yudisium;
    }
}
if(!empty($yudisiumInfo))
{
    foreach ($yudisiumInfo as $uf)
    {
        $nim = $uf->nim;
        $nama = $uf->nama;
        $id_mahasiswa = $uf->id_mahasiswa;
    }
}
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><a href="<?php echo base_url()?>akademik/yudisium"><i class="fa fa-chevron-left"></i></a> &nbsp;Yudisium</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--berkas mahasiswa-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail Pengajuan<small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <span class="col-md-2 badge"><strong>NIM</strong></span>
                        <span class="col-md-7"><?php echo $nim?></span>
                    </div>
                    <br>
                    <div class="row">
                        <span class="col-md-2 badge"><strong>Nama</strong></span>
                        <span class="col-md-7"><?php echo $nama?></span>
                    </div>
                </div>
                <div class="col-md-6">
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
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr bgcolor="#67CEA6" style="color: white">
                                    <th colspan="4"><h4><strong>Data Berkas Yudisium</strong></h4></th>
                                </tr>
                                <tr bgcolor="#59BD96" style="color: white">
                                    <th>No</th>
                                    <th>Berkas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($berkasInfo))
                                {
                                    foreach($berkasInfo as $record)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $record->id_berkas_yudisium ?></td>
                                            <td><?php echo $record->nama_berkas ?></td>
                                            <?php if ($record->isValid == '3') {
                                                echo "<td><span class=\"label label-danger\">" . "Ditolak" . "</span></td>";
                                            } elseif ($record->isValid == '2') {
                                                echo "<td><span class=\"label label-success\">" . "Diterima" . "</span></td>";
                                            }elseif ($record->isValid == '1') {
                                                echo "<td><span class=\"label label-warning\">" . "Proses" . "</span></td>";
                                            } else {
                                                echo "<td><span class=\"label label-default\">" . "Belum Diunggah" . "</span></td>";
                                            }
                                            ?>
                                            <td>
                                                <?php if($record->id_berkas_yudisium == '1' && $record->path !=''){?>
                                                    <a href="<?php echo base_url()?>uploads/yudisium/permohonan/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php }elseif($record->id_berkas_yudisium == '2' && $record->path !=''){?>
                                                    <a href="<?php echo base_url()?>uploads/yudisium/berita-acara/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php }elseif($record->id_berkas_yudisium == '3' && $record->path !=''){?>
                                                    <a href="<?php echo base_url()?>uploads/yudisium/surat-tanda-terima/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php }elseif($record->id_berkas_yudisium == '4' && $record->path !=''){?>
                                                    <a href="<?php echo base_url()?>uploads/yudisium/poster/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php }elseif($record->id_berkas_yudisium == '5' && $record->path !=''){?>
                                                    <a href="<?php echo base_url()?>uploads/yudisium/laporan-final/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php }elseif($record->id_berkas_yudisium == '6' && $record->path !=''){?>
                                                    <a href="<?php echo base_url()?>uploads/yudisium/ijazah/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php }elseif($record->id_berkas_yudisium == '7' && $record->path !=''){?>
                                                    <a href="<?php echo base_url()?>uploads/yudisium/sertifikat/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php }else{?>
                                                    <?php if ($record->path!=null){?>
                                                        <a href="<?php echo base_url()?>uploads/yudisium/tambahan-syarat/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    <?php }?>
                                                <?php }?>
                                                <?php if ($record->path != null){?>
                                                    <a href="<?php echo base_url()?>akademik/yudisium/accept/<?php echo $record->id_valid_yudisium?>/<?php echo $yudisiumInfo[0]->id_yudisium?>" class="btn btn-success"><i class="fa fa-check"></i></a>
                                                    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#RevisiModal<?php echo $record->id_berkas_yudisium; ?>"><i class="fa fa-times"></i></a>
                                                <?php }?>
                                            </td>
                                            <!--modal-->
                                            <div id="RevisiModal<?php echo $record->id_berkas_yudisium; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">Revisi</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="testmodal" style="padding: 5px 20px;">
                                                                <form id="tambah-pesan" action="<?php echo base_url()?>akademik/yudisium/pesan/<?php echo $record->id_valid_yudisium?>/<?php echo $yudisiumInfo[0]->id_yudisium?>" method="post" role="form" data-parsley-validate class="form-horizontal form-label-left">
                                                                    <div class="modal-body">
                                                                        <div id="testmodal" style="padding: 5px 20px;">
                                                                            <div class="form-group">
                                                                                <input type="hidden" class="form-control" name="id_mahasiswa" value="<?php echo $yudisiumInfo[0]->id_mahasiswa?>">
                                                                                <label class="col-sm-3 col-md-12 control-label">Judul</label>
                                                                                <input type="text" class="form-control" name="nama" value="<?php echo $record->nama_berkas?>">
                                                                                <br>
                                                                                <label class="col-sm-3 col-md-12 control-label">Pesan</label>
                                                                                <textarea class="form-control" style="height:55px;" id="pesan" name="deskripsi"></textarea>
                                                                            </div>
                                                                            <input type="submit" value="Submit" class="btn btn-primary pull-right">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
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
    </div>
</div>
