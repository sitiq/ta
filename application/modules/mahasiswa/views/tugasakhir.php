<?php
/**
 * Created by nad.
 * Date: 22/03/2018
 * Time: 12:48
 * Description:
 */
?>
<?php
$pilihan = array();
//diset null karna untuk pilihan ke tiga
$pilihan[2] = '';
$proyek = array();
$id_pengajuan_ta = array();
$id_usulan = '';
$judul = '';
$deskripsi = '';
$bisnis_rule = '';
$arr_jenis = array();
$arr_jenis[2] = '';
//cek jenis khusus inputan ke-3
$jenis = '';
// get periode
$periode = '';
$ta = '';
$id_periode = '';

// active pane saat edit form
$active_proyek = 0;
$active_usulan = 0;

if(!empty($periodeInfo))
{
    foreach ($periodeInfo as $uf)
    {
        $ta = $uf->status_ta;
        $periode = $uf->status_periode;
        $id_periode = $uf->id_periode;
    }
}

if (!empty($taInfo)) {
    $i = 0;
    foreach ($taInfo as $record) {
        if($record->jenis == "proyek") {
            $pilihan[$i] = $record->pilihan;
            $id_pengajuan_ta[$i] = $record->id_pengajuan_ta;
            $arr_jenis[$i] = $record->jenis;
            // apabila jenis pilihannya = proyek
            $proyek[$i] = $record->id_proyek;
            if($arr_jenis[2] == "proyek") {
                $active_proyek = 1;
                $jenis = 'proyek';
            }
            $i++;
        } else {
            // apabila jenis pilihannya = usulan
            // langsung dikasih indeks yang ke-3 (array mulai dari 0) karna tempatnya adalah dipaling bawah/pilihan ke-3
            $pilihan[2] = $record->pilihan;
            $id_usulan = $record->id_usulan;
            $id_pengajuan_ta[2] = $record->id_pengajuan_ta;
            $arr_jenis[$i] = $record->jenis;

            $judul = $record->judul;
            $deskripsi = $record->deskripsi;
            $bisnis_rule = $record->bisnis_rule;

            if($arr_jenis[2] == "usul") {
                $active_usulan = 1;
                $jenis = 'usul';
            }
        }
    }
}
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Pendaftaran Tugas Akhir</h3>
        </div>
    </div>
    <div class="clearfix"></div>
<!--    validasi berdasarkan periode-->
    <?php if ($ta == 1 && $periode == 1){?>
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
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x-panel">
                    <?php if (!empty($taInfo)) {?>
                        <div class="x_panel">
                            <div class="x_title">
                                <h3><strong>STATUS : AKTIF</strong></h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="tab-content">
                                <a class="btn btn-primary pull-right" data-toggle="tab" href="#edit" ><i class="fa fa-edit"></i> Edit</a>
<!--                                <button class="btn btn-warning pull-right"><i class="fa fa-edit"></i> Ganti Judul</button>-->
                                <!--                        form info-->
                                <div class="tab-pane active fade in" id="content">
                                    <div class="x_content">
                                        <div class="form-group">
                                            <?php
                                            foreach ($taInfo as $record) {
                                                if($record->jenis == "proyek") {
                                                    ?>
                                                    <!--                                    proyek-->
                                                    <div class="row">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <?php echo $record->pilihan ?></label>
                                                        <div style="padding-left: 0px;" class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" class="form-control" value="<?php echo $record->nama ?>" readonly>
                                                        </div>
                                                        <div class="clearfix" style="margin-bottom: 2%"></div>
                                                    </div>
                                                <?php } else {?>
                                                    <!--                                    usulan-->
                                                    <div class="row">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <?php echo $record->pilihan ?></label>
                                                        <div class="well col-md-8">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Usulan Judul</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <span><?php echo $record->judul ?></span>
                                                            </div>
                                                            <div class="clearfix" style="margin-bottom: 2%"></div>
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Project</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
													<span>
														<?php echo $record->deskripsi ?>
													</span>
                                                            </div>
                                                            <div class="clearfix" style="margin-bottom: 2%"></div>
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Business Rule</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
													<span>
														<?php echo $record->bisnis_rule ?>
													</span>
                                                            </div>
                                                            <div class="clearfix" style="margin-bottom: 2%"></div>
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Persetujuan Instansi</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <a href=""><?php echo $record->file_persetujuan ?></a>
                                                            </div>
                                                            <div class="clearfix" style="margin-bottom: 2%"></div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!--                        end tab pane-->
                                <div class="tab-pane fade in" id="edit">
                                    <a href="#content" data-toggle="tab" class="btn btn-primary" >Kembali</a>
                                    <div class="x_content">
                                        <form role="form" id="daftar" action="<?php echo base_url()?>mahasiswa/pengajuan/edit_ta" method="POST" data-parsley-validate class="form-horizontal form-label-left" role="form" >
                                            <input type="hidden" name="id_periode" value="<?php echo $id_periode?>">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <font color="red">*</font></label>
                                                <input style="display: inline; width: 55px; padding: 6px 12px;" type="number" min="1" max="3" class="col-md-3 col-sm-3 col-xs-12 form-control distinctemails" name="satu" value="<?php echo $pilihan[0]; ?>" >
                                                <!-- Get Id Pengajuan TA -->
                                                <input type="hidden" name="pilihan1" value="<?php echo $id_pengajuan_ta[0] ?>">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="proyeksatu" class="form-control">
                                                        <option value="">Pilih ..</option>
                                                        <?php
                                                        if(!empty($proyekInfo)) {
                                                            foreach($proyekInfo as $record) {
                                                                ?>
                                                                <option value="<?php echo $record->id_proyek ?>" <?php if ($proyek[0]==$record->id_proyek){ echo "selected";} ?> ><?php echo $record->nama ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="clearfix" style="margin-bottom: 2%"></div>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <font color="red">*</font></label>
                                                <input style="display: inline; width: 55px; padding: 6px 12px;" type="number" min="1" max="3" class="col-md-3 col-sm-3 col-xs-12 form-control distinctemails" name="dua" value="<?php echo $pilihan[1]; ?>" >
                                                <!-- Get Id Pengajuan TA -->
                                                <input type="hidden" name="pilihan2" value="<?php echo $id_pengajuan_ta[1] ?>">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="proyekdua" class="form-control">
                                                        <option value="">Pilih ..</option>
                                                        <?php
                                                        if(!empty($proyekInfo)) {
                                                            foreach($proyekInfo as $record) {
                                                                ?>
                                                                <option value="<?php echo $record->id_proyek ?>" <?php if ($proyek[1]==$record->id_proyek){ echo "selected";} ?> ><?php echo $record->nama ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="clearfix" style="margin-bottom: 2%"></div>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <font color="red">*</font></label>
                                                <input style="display: inline; width: 55px; padding: 6px 12px;" type="number" min="1" max="3" class="col-md-3 col-sm-3 col-xs-12 form-control distinctemails" id="tiga" name="tiga" value="<?php echo $pilihan[2]; ?>" >
                                                <!-- Get Id Pengajuan TA -->
                                                <input type="hidden" name="pilihan3" value="<?php echo $id_pengajuan_ta[2] ?>">
                                                <input type="hidden" name="jenis_pilihan3" value="<?php echo $jenis ?>">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="btn-group" data-toggle="buttons" id="pilihan3">
                                                        <a class="<?php if($active_usulan != 0) {echo 'active ';} ?>btn btn-default" href="#tab_content3" role="tab" data-toggle="tab" aria-expanded="true"><input type="radio" name="jenis" value="usul" <?php if($active_usulan != 0) {echo 'checked ';} ?> >Usulan</a>
                                                        <a class="<?php if($active_proyek != 0) {echo 'active ';} ?>btn btn-default" href="#tab_content4" role="tab" data-toggle="tab" aria-expanded="true"><input type="radio" name="jenis" value="proyek" <?php if($active_proyek != 0) {echo 'checked ';} ?> >Project</a>
                                                    </div>
                                                </div>
                                                <div class="clearfix" style="margin-bottom: 2%"></div>
                                                <!--pane 2-->
                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                    <div id="myTabContent" class="tab-content">
                                                        <!--pane ide-->
                                                        <div role="tabpanel" class="<?php if($active_usulan != 0) {echo 'active ';} ?>tab-pane fade in" id="tab_content3" aria-labelledby="home-tab">
                                                            <!--pilihan usulan-->
                                                            <div class="row">
                                                                <br/>
                                                                <h4><strong>Usulan Ide</strong></h4>
                                                                <small>
                                                                    Lengkapi form sesuai dengan usulan ide<br/>
                                                                    <!-- Get Id Usulan -->
                                                                    <input type="hidden" name="id_usulan" value="<?php echo $id_usulan ?>">
                                                                    <br/>
                                                                </small>
                                                                <br/>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Usulan Judul <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="text" name="judul" class="form-control col-md-7 col-xs-12" placeholder="jawaban anda" value="<?php echo $judul ?>" >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Project <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <textarea type="text" name="deskripsi" id="deskripsi" class="form-control col-md-7 col-xs-12" placeholder="Deskripsikan dengan singkat dan jelas"><?php echo $deskripsi ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Business Rule <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <textarea type="text" name="bisnis_rule" id="bisnis" class="form-control col-md-7 col-xs-12" placeholder="Bisnis yang diusulkan meliputi alur proses yang ada, data dan pengguna yang terlibat di dalamnya"><?php echo $bisnis_rule ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Persetujuan Institusi
                                                                    </label><small>Bagi yang mengajukan project dari institusi (jika ada)</small>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="file" name="file_persetujuan" class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-9">
                                                                    <input type="submit" class="btn btn-success pull-right" value="Submit">
                                                                </div>
                                                            </div>
                                                            <!--end usulan-->
                                                        </div>
                                                        <!--end ide-->

                                                        <!--start project-->
                                                        <div role="tabpanel" class="<?php if($active_proyek != 0) {echo 'active ';}?>tab-pane fade in" id="tab_content4" aria-labelledby="home-tab">
                                                            <div class="row">
                                                                <div>
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</label>
                                                                    <!-- Get Id Pengajuan TA Proyek -->
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <select name="proyektiga" class="form-control">
                                                                            <option value="">Pilih ..</option>
                                                                            <?php
                                                                            if(!empty($proyekInfo)) {
                                                                                foreach($proyekInfo as $record) {
                                                                                    ?>
                                                                                    <option value="<?php echo $record->id_proyek ?>" <?php if(!empty($proyek[2])){ if ($proyek[2]==$record->id_proyek){ echo "selected";} } ?> ><?php echo $record->nama ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <input type="submit" class="btn btn-success pull-right" style="margin-top: 3%" value="Submit" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end project-->
                                                    </div>
                                                </div>
                                                <!--end pane 2-->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--                        end tab pane-->
                                <!--                        form edit-->
                                <div class="tab-pane fade in" id="edit">
                                    <a href="#content" data-toggle="tab" class="btn btn-primary" >Kembali</a>
                                    <div class="x_content">
                                        <form role="form" id="daftar" action="<?php echo base_url() ?>mahasiswa/pengajuan/edit_ta" method="POST" data-parsley-validate class="form-horizontal form-label-left" role="form" >
                                            <input type="hidden" name="id_periode" value="<?php echo $id_periode?>">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <font color="red">*</font></label>
                                                <input style="display: inline; width: 55px; padding: 6px 12px;" type="number" min="1" max="3" class="col-md-3 col-sm-3 col-xs-12 form-control distinctemails" name="satu" value="<?php echo $pilihan[0]; ?>" >
                                                <!-- Get Id Pengajuan TA -->
                                                <input type="hidden" name="pilihan1" value="<?php echo $id_pengajuan_ta[0] ?>">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="proyeksatu" class="form-control">
                                                        <option value="">Pilih ..</option>
                                                        <?php
                                                        if(!empty($proyekInfo)) {
                                                            foreach($proyekInfo as $record) {
                                                                ?>
                                                                <option value="<?php echo $record->id_proyek ?>" <?php if ($proyek[0]==$record->id_proyek){ echo "selected";} ?> ><?php echo $record->nama ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="clearfix" style="margin-bottom: 2%"></div>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <font color="red">*</font></label>
                                                <input style="display: inline; width: 55px; padding: 6px 12px;" type="number" min="1" max="3" class="col-md-3 col-sm-3 col-xs-12 form-control distinctemails" name="dua" value="<?php echo $pilihan[1]; ?>" >
                                                <!-- Get Id Pengajuan TA -->
                                                <input type="hidden" name="pilihan2" value="<?php echo $id_pengajuan_ta[1] ?>">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="proyekdua" class="form-control">
                                                        <option value="">Pilih ..</option>
                                                        <?php
                                                        if(!empty($proyekInfo)) {
                                                            foreach($proyekInfo as $record) {
                                                                ?>
                                                                <option value="<?php echo $record->id_proyek ?>" <?php if ($proyek[1]==$record->id_proyek){ echo "selected";} ?> ><?php echo $record->nama ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="clearfix" style="margin-bottom: 2%"></div>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <font color="red">*</font></label>
                                                <input style="display: inline; width: 55px; padding: 6px 12px;" type="number" min="1" max="3" class="col-md-3 col-sm-3 col-xs-12 form-control distinctemails" id="tiga" name="tiga" value="<?php echo $pilihan[2]; ?>" >
                                                <!-- Get Id Pengajuan TA -->
                                                <input type="hidden" name="pilihan3" value="<?php echo $id_pengajuan_ta[2] ?>">
                                                <input type="hidden" name="jenis_pilihan3" value="<?php echo $jenis ?>">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="btn-group" data-toggle="buttons" id="pilihan3">
                                                        <a class="<?php if($active_usulan != 0) {echo 'active ';} ?>btn btn-default" href="#tab_content3" role="tab" data-toggle="tab" aria-expanded="true"><input type="radio" name="jenis" value="usul" <?php if($active_usulan != 0) {echo 'checked ';} ?> >Usulan</a>
                                                        <a class="<?php if($active_proyek != 0) {echo 'active ';} ?>btn btn-default" href="#tab_content4" role="tab" data-toggle="tab" aria-expanded="true"><input type="radio" name="jenis" value="proyek" <?php if($active_proyek != 0) {echo 'checked ';} ?> >Project</a>
                                                    </div>
                                                </div>
                                                <div class="clearfix" style="margin-bottom: 2%"></div>
                                                <!--pane 2-->
                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                    <div id="myTabContent" class="tab-content">
                                                        <!--pane ide-->
                                                        <div role="tabpanel" class="<?php if($active_usulan != 0) {echo 'active ';} ?>tab-pane fade in" id="tab_content3" aria-labelledby="home-tab">
                                                            <!--pilihan usulan-->
                                                            <div class="row">
                                                                <br/>
                                                                <h4><strong>Usulan Ide</strong></h4>
                                                                <small>
                                                                    Lengkapi form sesuai dengan usulan ide<br/>
                                                                    <!-- Get Id Usulan -->
                                                                    <input type="hidden" name="id_usulan" value="<?php echo $id_usulan ?>">
                                                                    <br/>
                                                                </small>
                                                                <br/>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Usulan Judul <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="text" name="judul" class="form-control col-md-7 col-xs-12" placeholder="jawaban anda" value="<?php echo $judul ?>" >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Project <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <textarea type="text" name="deskripsi" id="deskripsi" class="form-control col-md-7 col-xs-12" placeholder="Deskripsikan dengan singkat dan jelas"><?php echo $deskripsi ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Business Rule <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <textarea type="text" name="bisnis_rule" id="bisnis" class="form-control col-md-7 col-xs-12" placeholder="Bisnis yang diusulkan meliputi alur proses yang ada, data dan pengguna yang terlibat di dalamnya"><?php echo $bisnis_rule ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Persetujuan Institusi
                                                                    </label><small>Bagi yang mengajukan project dari institusi (jika ada)</small>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="file" name="file_persetujuan" class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-9">
                                                                    <input type="submit" class="btn btn-success pull-right" value="Submit">
                                                                </div>
                                                            </div>
                                                            <!--end usulan-->
                                                        </div>
                                                        <!--end ide-->

                                                        <!--start project-->
                                                        <div role="tabpanel" class="<?php if($active_proyek != 0) {echo 'active ';}?>tab-pane fade in" id="tab_content4" aria-labelledby="home-tab">
                                                            <div class="row">
                                                                <div>
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</label>
                                                                    <!-- Get Id Pengajuan TA Proyek -->
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <select name="proyektiga" class="form-control">
                                                                            <option value="">Pilih ..</option>
                                                                            <?php
                                                                            if(!empty($proyekInfo)) {
                                                                                foreach($proyekInfo as $record) {
                                                                                    ?>
                                                                                    <option value="<?php echo $record->id_proyek ?>" <?php if(!empty($proyek[2])){ if ($proyek[2]==$record->id_proyek){ echo "selected";} } ?> ><?php echo $record->nama ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <input type="submit" class="btn btn-success pull-right" style="margin-top: 3%" value="Submit" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end project-->
                                                    </div>
                                                </div>
                                                <!--end pane 2-->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--                        end tab pane-->
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="x_panel">
                            <div class="x_title">
                                <h5 class="badge bg-red">Pastikan Data Diri Terbaru pada
                                    <a href="<?php base_url()?>../profil" style="color: white"><u>PROFIL</u></a>
                                    Anda</h5>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br>
                                <form role="form" id="daftar" action="<?php echo base_url() ?>mahasiswa/pengajuan/daftar_ta" method="POST" data-parsley-validate class="form-horizontal form-label-left" role="form" >
                                    <input type="hidden" name="id_periode" value="<?php echo $id_periode?>">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <font color="red">*</font></label>
                                        <input style="display: inline; width: 55px; padding: 6px 12px;" type="number" min="1" max="3" class="col-md-3 col-sm-3 col-xs-12 form-control distinctemails" name="satu" value="1" >
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="proyeksatu" class="form-control" required>
                                                <option value="">Pilih ..</option>
                                                <?php
                                                if(!empty($proyekInfo)) {
                                                    foreach($proyekInfo as $record) {
                                                        ?>
                                                        <option value="<?php echo $record->id_proyek ?>" ><?php echo $record->nama ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="clearfix" style="margin-bottom: 2%"></div>
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <font color="red">*</font></label>
                                        <input style="display: inline; width: 55px; padding: 6px 12px;" type="number" min="1" max="3" class="col-md-3 col-sm-3 col-xs-12 form-control distinctemails" name="dua" value="2" >
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="proyekdua" class="form-control" required>
                                                <option value="">Pilih ..</option>
                                                <?php
                                                if(!empty($proyekInfo)) {
                                                    foreach($proyekInfo as $record) {
                                                        ?>
                                                        <option value="<?php echo $record->id_proyek ?>" ><?php echo $record->nama ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="clearfix" style="margin-bottom: 2%"></div>
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <font color="red">*</font></label>
                                        <input style="display: inline; width: 55px; padding: 6px 12px;" type="number" min="1" max="3" class="col-md-3 col-sm-3 col-xs-12 form-control distinctemails" id="tiga" name="tiga" value="3" >
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="btn-group" data-toggle="buttons" id="pilihan3">
                                                <a class="active btn btn-default" href="#tab_content3" role="tab" id="ide" data-toggle="tab" aria-expanded="true"><input type="radio" name="jenis_radio" value="usul" checked>Usul Ide</a>
                                                <a class="btn btn-default" href="#tab_content4" role="tab" id="proyek" data-toggle="tab" aria-expanded="true"><input type="radio" name="jenis_radio" value="proyek">Project</a>
                                            </div>
                                        </div>
                                        <div class="clearfix" style="margin-bottom: 2%"></div>
                                        <!--pane 2-->
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <div id="myTabContent" class="tab-content">
                                                <!--pane ide-->
                                                <div role="tabpanel" class="active tab-pane fade in" id="tab_content3" aria-labelledby="home-tab">
                                                    <!--status perpanjangan-->
                                                    <div class="row">
                                                        <br/>
                                                        <h4><strong>Usulan Ide</strong></h4>
                                                        <small>
                                                            Lengkapi form sesuai dengan usulan ide<br/>
                                                            <br/>
                                                        </small>
                                                        <br/>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Usulan Judul <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="judul" class="form-control col-md-7 col-xs-12" placeholder="jawaban anda">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Project <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <textarea type="text" name="deskripsi" id="deskripsi" class="form-control col-md-7 col-xs-12" placeholder="Deskripsikan dengan singkat dan jelas"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Business Rule <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <textarea type="text" name="bisnis_rule" id="bisnis" class="form-control col-md-7 col-xs-12" placeholder="Bisnis yang diusulkan meliputi alur proses yang ada, data dan pengguna yang terlibat di dalamnya"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Persetujuan Institusi
                                                            </label><small>Bagi yang mengajukan project dari institusi (jika ada)</small>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="file" name="file_persetujuan" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-9">
                                                            <input type="submit" class="btn btn-success pull-right" value="Submit">
                                                        </div>
                                                    </div>
                                                    <!--end perpanjangan-->
                                                </div>
                                                <!--end ide-->
                                                <!--start project-->
                                                <div role="tabpanel" class="tab-pane fade in" id="tab_content4" aria-labelledby="home-tab">
                                                    <!--status baru-->
                                                    <div class="row">
                                                        <div>
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <select name="proyektiga" class="form-control">
                                                                    <option value="">Pilih ..</option>
                                                                    <?php
                                                                    if(!empty($proyekInfo)) {
                                                                        foreach($proyekInfo as $record) {
                                                                            ?>
                                                                            <option value="<?php echo $record->id_proyek ?>" ><?php echo $record->nama ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <input type="submit" class="btn btn-success pull-right" style="margin-top: 3%" value="Submit" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end project-->
                                            </div>
                                        </div>
                                        <!--end pane 2-->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } else {?>
<!--    end validasi berdasarkan periode-->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <center>
                            <h4>
                                <strong>BUKAN PERIODE </strong>PENDAFTARAN TUGAS AKHIR
                            </h4>
                            <br>
                            <h5>Silahkan tunggu informasi selanjutnya</h5>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>
<script>
    $(document).ready(function(){
        jQuery.validator.addMethod("notEqualToGroup", function(value, element, options) {
            // get all the elements passed here with the same class
            var elems = $(element).parents('form').find(options[0]);
            // the value of the current element
            var valueToCompare = value;
            // count
            var matchesFound = 0;
            // loop each element and compare its value with the current value
            // and increase the count every time we find one
            jQuery.each(elems, function(){
                thisVal = $(this).val();
                if(thisVal == valueToCompare){
                    matchesFound++;
                }
            });
            // count should be either 0 or 1 max
            if(this.optional(element) || matchesFound <= 1) {
                //elems.removeClass('error');
                return true;
            } else {
                //elems.addClass('error');
            }
        }, jQuery.validator.format("<font color='red'>Setiap pilihan harus berbeda.</font>"))

        $("#daftar").validate({
            rules: {
                satu: {
                    required: true,
                    notEqualToGroup: ['.distinctemails']
                },
                dua: {
                    required: true,
                    notEqualToGroup: ['.distinctemails']
                },
                tiga: {
                    required: true,
                    notEqualToGroup: ['.distinctemails']
                },
            },
        });

        // hapus isi inputan saat klik button proyek
        $('#proyek').click(function() {
            $('input[name=judul]').val('');
            $('#deskripsi').val('');
            $('#bisnis').val('');
            $('input[name=file_persetujuan]').val('');
        });

        // kembalikan pilihan saat klik button ide
        $('#ide').click(function() {
            $('select[name=proyektiga]').val('').change();
        });

    });
</script>