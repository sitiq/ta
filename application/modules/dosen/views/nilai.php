<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 07:31
 * Description:
 */
var_dump($nilaiInfo);
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
                                                1<input required type="radio" name="radio_<?php echo $i?>" value="<?php echo $record->id_komponen_nilai . ' ' .'1'?>" />
                                                2<input type="radio" name="radio_<?php echo $i?>" value="<?php echo $record->id_komponen_nilai . ' ' .'2'?>" />
                                                3<input type="radio" name="radio_<?php echo $i?>" value="<?php echo $record->id_komponen_nilai . ' ' .'3'?>" />
                                                4<input type="radio" name="radio_<?php echo $i?>" value="<?php echo $record->id_komponen_nilai . ' ' .'4'?>" />
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
                                        <span><h4><strong>Total : </strong>3,78</h4></span>
                                        <input type="submit" class="btn btn-warning pull-right">
                                    </td>
                                </tr>
                                <input type="hidden" name="id_penilaian" value="<?php echo $record->id_penilaian?>">
                                <input type="hidden" name="id_sidang" value="<?php echo $record->id_sidang?>">
                            </form>
                            </tbody>
                        </table>
                        <!--end table nilai-->
                    </div>
                    <div class="col-md-6">
                        <!--table nilai-->
                        <table class="table table-bordered">
                            <thead>
                            <tr bgcolor="#59BD96" style="color: white">
                                <th colspan="4"><h4><strong>Unggah Revisi Laporan</strong></h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="3">
                                    <input type="number" name="id" hidden>
                                    <input type="text" name="revisi" hidden>
                                    <input type="file" class="form-control" name="path">
                                    <button class="btn btn-warning pull-right" style="margin-top: 3%">Submit</button>
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
