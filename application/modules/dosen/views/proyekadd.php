<?php
/**
 * Created by nad.
 * Date: 22/03/2018
 * Time: 21:12
 * Description:
 */
?>
<?php
$id_dosen = '';
$nama = '';

if(!empty($dosenInfo))
{
    foreach ($dosenInfo as $uf)
    {
        $id_mahasiswa = $uf->id_dosen;
        $nama = $uf->nama;
    }
}
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><a href="dosen_listproyek.html"><i class="fa fa-chevron-left"></i></a> Project Management <small>Add, Edit</small></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Detail Proyek</h4>
                </div>
                <div class="x_content">
                    <br />
                    <form id="tambah-proyek" action="<?php echo base_url()?>dosen/proyek/addNewProject" method="post" role="form" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama-dosen">Penanggung jawab<span class="required"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" id="nama-dosen" name="nama-dosen">
                                    <option value="" disabled selected>Pilih ..</option>
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
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama-proyek">Nama Proyek <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="nama-proyek" id="nama-proyek" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="instansi" class="control-label col-md-3 col-sm-3 col-xs-12">Instansi <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="instansi" class="form-control col-md-7 col-xs-12" type="text" name="instansi">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 pull-right">
                                <a href="" class="btn btn-danger">Cancel</a>
                                <input type="submit" class="btn btn-success" value="Submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
