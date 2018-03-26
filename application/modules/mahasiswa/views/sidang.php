<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 07:28
 * Description:
 */
var_dump($idMahasiswa);
//echo date('Y-m-d h:s:i');
?>
<?php
$id_berkas_sidang = '';
$nama_berkas = '';
$id_valid_sidang = '';
$isValid = '';
$path = '';
$id_sidang = '';
$id_mahasiswa = '';

if(!empty($berkasInfo))
{
    foreach ($berkasInfo as $uf)
    {
        $id_berkas_sidang = $uf->id_berkas_sidang;
        $nama_berkas = $uf->nama_berkas;
        $id_valid_sidang = $uf->id_valid_sidang;
        $isValid = $uf->isValid;
        $path = $uf->path;
        $id_sidang = $uf->id_sidang;
        $id_mahasiswa = $uf->id_mahasiswa;
    }
}
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Pendaftaran Sidang</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-6">
                        <h2>Penting !<br><small>
                                <ul>
                                    <li>Diwajibkan untuk membaca tata cara pada PENGUMUMAN.</li>
                                </ul>
                                <h5 class="badge bg-red">Pastikan Data Diri Terbaru pada Profil Anda</h5>
                            </small></h2>
                    </div>
                    <div class="col-md-6">
                        <?php if ($id_sidang == null){?>
                        <form action="<?php echo base_url() ?>mahasiswa/sidang/daftar" method="post" enctype="multipart/form-data" role="form">
                            <input type="submit" class="btn btn-primary pull-right" value="Daftar">
                        </form>
                        <?php }?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
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
                    <!--start pane upload-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content">
                            <?php
                            if(!empty($berkasInfo))
                                {
                                    foreach($berkasInfo as $record)
                                    {
                            ?>
                                    <!--Pane upload berkas-->
                                    <div role="tabpanel" class="tab-pane fade in" id="tab_content_<?php echo $record->id_valid_sidang ?>" aria-labelledby="usulan">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <strong><h4><?php echo $record->nama_berkas?></h4>
                                                </strong>
                                                <?php echo $record->path ?>
                                            </tr>
                                            <form action="<?php echo base_url();?>mahasiswa/sidang/editBerkas" enctype="multipart/form-data" method="post">
                                                <tr>
                                                    <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                                    <th>
                                                        <input type="hidden" value="<?php echo $record->id_mahasiswa?>">
                                                        <input value="<?php echo $record->id_berkas_sidang ?>" type="number" name="id_berkas_sidang" hidden>
                                                        <input value="<?php echo $record->id_valid_sidang ?>" type="number" name="id_valid_sidang" hidden>
                                                        <input type="text" name="nama_berkas" value="<?php echo $record->nama_berkas ?>" hidden>
                                                        <input value="<?php echo $record->path ?>" type="file" name="path" class="form-control">
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <input type="submit" class="btn btn-primary btn-sm" value="Save">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </form>
                                        </table>
                                    </div>
                                        <?php
                                    }
                                }
                            ?>
                            <!--pane krs semester-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="krs">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas KRS Semester Terakhir<small><i> Ditandatangan oleh Dosen Pembimbing Akademik</i></small></h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="krs-terakhir" hidden>
                                                <input type="file" name="path" class="form-control">
                                            </form>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end pane upload-->
                    <table class="table table-bordered">
                        <thead>
                        <tr bgcolor="#67CEA6" style="color: white">
                            <th colspan="4"><h4><strong>Data Berkas Sidang</strong></h4></th>
                        </tr>
                        <tr bgcolor="#59BD96" style="color: white">
                            <th>Aksi</th>
                            <th>No</th>
                            <th>Berkas</th>
                            <th>Status</th>
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
                                    <td>
                                        <a href="#tab_content_<?php echo $record->id_valid_sidang ?>" id="usulan" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-sm btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <?php if($record->id_berkas_sidang == '1' && $record->path !=''){?>
                                            <a href="<?php echo base_url()?>uploads/sidang/usulan-sidang/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php }elseif($record->id_berkas_sidang == '2' && $record->path !=''){?>
                                            <a href="<?php echo base_url()?>uploads/sidang/krs/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php }elseif($record->id_berkas_sidang == '3' && $record->path !=''){?>
                                            <a href="<?php echo base_url()?>uploads/sidang/rekap-nilai/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php }elseif($record->id_berkas_sidang == '4' && $record->path !=''){?>
                                            <a href="<?php echo base_url()?>uploads/sidang/kartu-hasil-studi/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php }elseif($record->id_berkas_sidang == '5' && $record->path !=''){?>
                                            <a href="<?php echo base_url()?>uploads/sidang/kartu-bimbingan/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php }elseif($record->id_berkas_sidang == '6' && $record->path !=''){?>
                                            <a href="<?php echo base_url()?>uploads/sidang/ktm/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php }elseif($record->id_berkas_sidang == '7' && $record->path !=''){?>
                                            <a href="<?php echo base_url()?>uploads/sidang/riwayat-registrasi/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php }elseif($record->id_berkas_sidang == '8' && $record->path !=''){?>
                                            <a href="<?php echo base_url()?>uploads/sidang/proposal/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php }elseif($record->id_berkas_sidang == '9' && $record->path !=''){?>
                                            <a href="<?php echo base_url()?>uploads/sidang/laporan/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php }elseif($record->id_berkas_sidang == '10' && $record->path !=''){?>
                                            <a href="<?php echo base_url()?>uploads/sidang/cover/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php }else{?>
                                            <?php if ($record->path!=null){?>
                                                <a href="<?php echo base_url()?>uploads/sidang/tambahan-syarat/<?php echo $record->path?>" class="btn btn-sm btn-info" target="_blank">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            <?php }?>
                                        <?php }?>
                                        <input type="hidden" value="<?php echo $record->id_valid_sidang ?>">
                                    </td>
                                    <td><?php echo $record->id_berkas_sidang ?></td>
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
                                </tr>
                                    <?php
                                }
                        }
                        ?>
                        </tbody>
                    </table>
                    <!--end upload berkas-->
                </div>
                <!--<div class="ln_solid"></div>-->
            </div>
        </div>
    </div>
</div>