<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 07:31
 * Description:
 */
?>
<?php
$id_dosen = '';
$nid = '';
$nama = '';
$foto = '';
$email = '';
$mobile = '';
$skill = '';

if(!empty($profilInfo))
{
    foreach ($profilInfo as $uf)
    {
        $id_dosen = $uf->id_dosen;
        $nid = $uf->nid;
        $nama = $uf->nama;
        $foto = $uf->foto;
        $email = $uf->email;
        $mobile = $uf->mobile;
        $skill = $uf->skill;
    }
}
//var_dump($profilInfo);
echo $id_dosen;
echo $nama;
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Profil <small>Dosen</small></h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="profile_left">
                        <div class="profile_img">
                            <div id="crop-photo">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" src="../../images/picture.jpg" alt="Avatar" title="Change the avatar">
                            </div>
                        </div>
                        <h3><?php echo $nama?></h3>

                        <ul class="list-unstyled user_data">
                            <li class="m-top-xs">
                                <strong>NIP : </strong>
                                <?php echo $nid?>
                            </li>
                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i> Dosen
                            </li>
                        </ul>
                        <!--                        alert-->
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $this->load->helper('form');
                                $error = $this->session->flashdata('error');
                                if($error)
                                {
                                    ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php } ?>
                                <?php
                                $success = $this->session->flashdata('success');
                                if($success)
                                {
                                    ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button></div>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--tab panel-->
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start detail profile-->
                            <a href="#tab_content2" class="btn btn-primary pull-right" role="tab" id="profile-edit" data-toggle="tab" aria-expanded="false">Update Profile</a>
                            <div class="x_title">
                                <h3>Detail Profil</h3>
                            </div>
                            <div class="x_content">
                                <div class="profile_left">
                                    <label><h4><i class="fa fa-user"></i> <strong>NAMA LENGKAP</strong></h4></label>
                                    <h4><?php echo $nama?></h4>
                                    <hr>
                                    <label><h4><strong>NIP / NIDN</strong></h4></label>
                                    <h4><?php echo $nid?></h4>
                                    <hr>
                                    <label><h4><strong>Email</strong></h4></label>
                                    <h4><?php echo $email?></h4>
                                    <hr>
                                    <label><h4><strong>No. HP</strong></h4></label>
                                    <h4><?php echo $mobile?></h4>
                                    <hr>
                                    <label><h4><strong>KEAHLIAN</strong></h4></label>
                                    <h4>
                                        <?php echo $skill?>
                                    </h4>
                                </div>
                            </div>
                            <!-- end detail profile -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <!-- start update profile -->
                            <div class="x_title">
                                <h2>Detail Profil<small></small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <!-- start update profile -->
                                <form id="demo-form" data-parsley-validate role="form" action="<?php echo base_url() ?>dosen/profil/editProfil">
                                    <label for="fullname">Nama Lengkap</label>
                                    <input type="text" id="nama" class="form-control" name="nama" value="<?php echo $nama?>"><br>
                                    <label for="nid">NIP / NIDN</label>
                                    <input type="text" id="nid" name="nid" class="form-control" data-parsley-trigger="change" value="<?php echo $nid?>"/><br>
                                    <label for="nid">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" data-parsley-trigger="change" value="<?php echo $email?>"/><br>
                                    <label for="nid">No. HP</label>
                                    <input type="number" id="mobile" name="mobile" max-length="13" class="form-control" data-parsley-trigger="change" value="<?php echo $mobile?>"/><br>
                                    <label for="skill">Keahlian <small>(pisahkan dengan 'koma')</small></label>
                                    <textarea class="form-control" id="skill" name="skill" id=""rows="3"><?php echo $skill?></textarea>
                                    <br/>
                                    <a href="#tab_content1" class="btn btn-primary" role="tab" id="home-tab" data-toggle="tab" aria-expanded="true">Save</a>
                                </form>
                            </div>
                            <!-- end update profile -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--tab panel-->
    </div>
</div>
