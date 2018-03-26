<div class="page-title">
    <div class="title_left">
        <h3>Manajemen Proyek
            <small>Edit</small>
        </h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <?php //var_dump($dataProyek) ?>
    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Detail Proyek</h4>
            </div>
            <div class="x_content">
                <br />
                <form id="addEditProyekForm" class="form-horizontal form-label-left" action="<?php echo base_url();?>akademik/proyek/edit"
                    method="post">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="select_dosen">Penanggung jawab
                            <span class="required"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="select_dosen" name="select_dosen" class="form-control" required="required">
                                <?php foreach ($dataDosen as $data) { ?>
                                    <?php if($data->id_dosen == $dataProyek[0]->id_dosen) { ?>
                                    <option selected="selected" value="<?php echo $data->id_dosen;?>">
                                        <?php echo $data->nama;?>
                                    </option>
                                    <?php } else { ?>
                                    <option value="<?php echo $data->id_dosen;?>">
                                        <?php echo $data->nama;?>
                                    </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nama_proyek">Nama Proyek
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="id_proyek" id="id_proyek" class="form-control col-md-7 col-xs-12" value="<?php echo $dataProyek[0]->id_proyek;?>">
                            <input type="text" name="nama_proyek" id="nama_proyek" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $dataProyek[0]->nama_proyek;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="instansi" class="control-label col-md-4 col-sm-4 col-xs-12">Instansi / Klien
                            <span class="required">
                                <i>(optional)</i>
                            </span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="instansi" class="form-control col-md-7 col-xs-12" type="text" name="instansi" value="<?php echo $dataProyek[0]->klien;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <center>
                                <a id="changeStatusLabel" onClick="unHide()">
                                    <u>Ubah Status Persetujuan</u>
                                </a>
                            </center>
                            <center>
                                <a id="cancelLabel" onClick="unHide()">
                                    <u>Cancel</u>
                                </a>
                            </center>
                        </div>
                    </div>
                    <div id="statusForm">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="status" name="status" class="form-control" required="required">
                                <option <?php echo ($dataProyek[0]->status == "disetujui" ? "selected=\"selected\"" : "") ?>value="disetujui">Disetujui</option>
                                <option <?php echo ($dataProyek[0]->status == "ditolak" ? "selected=\"selected\"" : "") ?> value="ditolak">Ditolak</option>
                                <option <?php echo ($dataProyek[0]->status == "pending" ? "selected=\"selected\"" : "") ?> value="pending">Pending</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 pull-right">
                            <a href="<?php echo base_url();?>akademik/proyek" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() . 'elusistatic/js/addEditProyek.js'?>"></script>

<script>
    var x = document.getElementById("statusForm");
    var y = document.getElementById("cancelLabel");
    var z = document.getElementById("changeStatusLabel");

    y.style.cursor = "pointer";
    z.style.cursor = "pointer";
    x.style.display = "none";
    y.style.display = "none";

    function unHide() {
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
</script>