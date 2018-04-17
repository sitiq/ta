<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 07:31
 * Description:
 */
?>
<?php
$path = '';

if(!empty($revisiInfo))
{
    foreach ($revisiInfo as $uf)
    {
        $path = $uf->path;
    }
}
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><a href="<?php echo base_url()?>dosen/pendadaran"><i class="fa fa-chevron-left"></i></a> &nbsp;Sidang Pendadaran</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--berkas mahasiswa-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Penilaian</h2>
                    <div class="clearfix" style="margin-top: -5%"></div>
                    <div class="well">
                        <ul>
                            <li>Simpan Laporan Tugas Akhir(.pdf) yang telah diberi pesan revisi, lalu unggah</li>
                        </ul>
                    </div>
                </div>
                <div class="x_content">
                    <p class="col-md-12 product_price"><strong>Penilaian : </strong>
                        <span class="badge bg-red">1</span> Kurang
                        <span class="badge bg-orange">2</span> Cukup
                        <span class="badge bg-green">3</span> Baik
                        <span class="badge bg-blue">4</span> Sangat Baik
                    </p>
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
                        <!--table nilai-->
                        <table class="table table-bordered">
                            <thead>
                            <tr bgcolor="#67CEA6" style="color: white">
                                <th colspan="4"><h4><strong>Data Penilaian</strong></h4></th>
                            </tr>
                            <tr bgcolor="#59BD96" style="color: white">
                                <th>No</th>
                                <th>Subject</th>
                                <th>Nilai</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form id="nilai-satu" action="<?php echo base_url()?>dosen/pendadaran/submitnilai" method="post" role="form" data-parsley-validate class="form-horizontal form-label-left">
                                <?php
                                if(!empty($nilaiInfo))
                                {
                                    $i=1;
                                    foreach($nilaiInfo as $record)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $record->id_komponen ?></td>
                                            <th><?php echo $record->nama_nilai ?></th>
                                            <td>
                                                <?php if ($record->nilai == 0){?>
                                                    <label>
                                                        1 <input type="radio" name="radio_<?php echo $i?>" value="<?php echo $record->id_komponen_nilai . ' ' .'1'?>" required><span class="label-text"></span>
                                                    </label>
                                                    <label>
                                                        2 <input type="radio" name="radio_<?php echo $i?>" value="<?php echo $record->id_komponen_nilai . ' ' .'2'?>"><span class="label-text"></span>
                                                    </label>
                                                    <label>
                                                        3 <input type="radio" name="radio_<?php echo $i?>" value="<?php echo $record->id_komponen_nilai . ' ' .'3'?>"><span class="label-text"></span>
                                                    </label>
                                                    <label>
                                                        4 <input type="radio" name="radio_<?php echo $i?>" value="<?php echo $record->id_komponen_nilai . ' ' .'4'?>"><span class="label-text"></span>
                                                    </label>
                                                <?php }else{?>
                                                    <center><?php echo $record->nilai?></center>
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }?>
                                    <input type="hidden" name="last_index" value="<?php echo $i?>">
                                <?php
                                }?>
                                <tr>
                                    <td colspan="3">
                                        <?php if ($record->nilai_akhir_dosen == 0){?>
                                            <a class="btn btn-warning pull-right" data-toggle="modal" data-target="#submit-nilai">Submit</a>
                                        <?php }else{?>
                                            <center><h4><strong>Rata-rata : </strong><?php echo $record->nilai_akhir_dosen?></h4></center>
                                        <?php }?>
                                    </td>
                                </tr>
                                <input type="hidden" name="nilai_akhir_dosen" value="<?php echo $record->nilai_akhir_dosen?>">
                                <input type="hidden" name="id_penilaian" value="<?php echo $record->id_penilaian?>">
                                <input type="hidden" name="id_sidang" value="<?php echo $record->id_sidang?>">
                                <!--modal submit nilai-->
                                <div id="submit-nilai" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Penilaian</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="testmodal" style="padding: 5px 20px;">
                                                    <div class="modal-body">
                                                        <center>
                                                            <h4>Pastikan nilai yang terisi telah benar dan sesuai</h4>
                                                            <h4>Setelah submit nilai, maka nilai tidak akan bisa diubah.</h4>
                                                            <div id="testmodal" style="padding: 5px 20px;">
                                                                <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                                                                <input type="submit" class="btn btn-success" value="Submit">
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </tbody>
                        </table>
                        <!--end table nilai-->
                    </div>
                    <div class="col-md-6">
                        <!--table revisi-->
                        <table class="table table-bordered">
                            <thead>
                            <tr bgcolor="#59BD96" style="color: white">
                                <th colspan="4"><h4><strong>Unggah Revisi Laporan</strong></h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="3">
                                    <form id="nilai-satu" action="<?php echo base_url()?>dosen/pendadaran/submitrevisi" enctype="multipart/form-data" method="post" role="form" data-parsley-validate class="form-horizontal form-label-left">
                                        <input type="hidden" name="id_penilaian" value="<?php echo $record->id_penilaian?>">
                                        <input type="hidden" name="id_mahasiswa" value="<?php echo $record->id_mahasiswa?>">
                                        <input type="hidden" name="id_anggota_sidang" value="<?php echo $record->id_anggota_sidang?>">
                                        <input type="file" class="form-control" name="path">
                                        <?php if ($path != ""){?>
                                        <a href="<?php echo base_url()?>uploads/revisi_sidang/<?php echo $path?>" class="btn btn-info" style="margin-top: 3%" download>
                                            <i class="fa fa-save"></i>
                                        </a>
                                        <?php }?>
                                        <input class="btn btn-warning pull-right" style="margin-top: 3%" type="submit">
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!--end table nilai-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>