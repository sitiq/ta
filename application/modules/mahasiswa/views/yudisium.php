<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 07:28
 * Description:
 */
?>
<?php
$id_berkas_yudisium = '';
$nama_berkas = '';
$id_valid_yudisium = '';
$isValid = '';
$path = '';
$id_yudisium = '';
$id_mahasiswa = '';

if(!empty($periodeInfo))
{
    foreach ($periodeInfo as $uf)
    {
        $periode_awal = $uf->tanggal_awal_regis;
        $periode_akhir = $uf->tanggal_akhir_regis;
    }
}

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
        $id_mahasiswa = $uf->id_mahasiswa;
    }
}
$date_now = (new DateTime())->format('Y-m-d');
$time_now = (new DateTime())->format('H:i');
$tanggal_awal = substr($periode_awal,0,10);
$waktu_awal = substr($periode_awal,10,6);
$tanggal_akhir = substr($periode_akhir,0,10);
$waktu_akhir = substr($periode_akhir,10,6);
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Pendaftaran Yudisium</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <!--    validasi berdasarkan periode-->
    <?php if ($date_now > $tanggal_awal && $date_now > $tanggal_akhir && $time_now > $waktu_awal && $time_now > $waktu_akhir){?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <center>
                            <h4>
                                <strong>BUKAN PERIODE </strong>PENDAFTARAN YUDISIUM
                            </h4>
                            <br>
                            <h5>Silahkan tunggu informasi selanjutnya</h5>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {?>
    <!--    end validasi berdasarkan periode-->
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
                        <?php if ($id_yudisium == null){?>
                            <form action="<?php echo base_url() ?>mahasiswa/yudisium/daftar" method="post" enctype="multipart/form-data" role="form">
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
                                    <div role="tabpanel" class="tab-pane fade in" id="tab_content_<?php echo $record->id_valid_yudisium ?>" aria-labelledby="usulan">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <strong><h4><?php echo $record->nama_berkas?></h4>
                                                </strong>
                                                <?php echo $record->path ?>
                                            </tr>
                                            <form action="<?php echo base_url();?>mahasiswa/yudisium/editBerkas" enctype="multipart/form-data" method="post">
                                                <tr>
                                                    <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                                    <th>
                                                        <input type="hidden" value="<?php echo $record->id_mahasiswa?>">
                                                        <input value="<?php echo $record->id_berkas_yudisium ?>" type="number" name="id_berkas_yudisium" hidden>
                                                        <input value="<?php echo $record->id_valid_yudisium ?>" type="number" name="id_valid_yudisium" hidden>
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
                        </div>
                    </div>
                    <!--end pane upload-->
                    <table class="table table-bordered">
                        <thead>
                        <tr bgcolor="#67CEA6" style="color: white">
                            <th colspan="4"><h4><strong>Data Berkas Yudisium</strong></h4></th>
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
                                        <a href="#tab_content_<?php echo $record->id_valid_yudisium ?>" id="usulan" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-sm btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
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
                                        <input type="hidden" value="<?php echo $record->id_valid_yudisium ?>">
                                    </td>
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
    <?php }?>
</div>
