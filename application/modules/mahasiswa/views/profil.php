<?php
/**
 * Created by nad.
 * Date: 15/03/2018
 * Time: 14:44
 * Description:
 */
?>
<?php //var_dump($data_mhs);?>
<?php

$id_mahasiswa = '';
$nim = '';
$nama = '';
$foto = '';
$jumlah_sks = '';
$ipk = '';
$email = '';
$mobile = '';
$skill = '';
$pengalaman = '';

if(!empty($profilInfo))
{
    foreach ($profilInfo as $uf)
    {
        $id_mahasiswa = $uf->id_mahasiswa;
        $nim = $uf->nim;
        $nama = $uf->nama;
        $foto = $uf->foto;
        $jumlah_sks = $uf->jumlah_sks;
        $ipk = $uf->ipk;
        $email = $uf->email;
        $mobile = $uf->mobile;
        $skill = $uf->skill;
        $pengalaman = $uf->pengalaman;
    }
}
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Profil <small>Mahasiswa</small></h3>
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
                                <img class="img-responsive avatar-view" src="<?php echo base_url()?>/berkas/foto/mahasiswa/<?php echo $foto?>" alt="Avatar" title="Change the avatar">
                            </div>
                        </div>
                        <h3><?php echo $nama ?></h3>

                        <ul class="list-unstyled user_data">
                            <li class="m-top-xs">
                                <strong>NIM : </strong>
                                <?php echo $nim ?>
                            </li>
                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i> Mahasiswa
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--tab panel-->
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="profil" aria-labelledby="home-tab">

                            <!-- start detail profile-->
                            <a href="#edit" class="btn btn-primary pull-right" role="tab" id="profile-edit" data-toggle="tab" aria-expanded="false">Update Profile</a>
                            <div class="x_title">
                                <h3>Detail Profil</h3>
                            </div>
                            <div class="x_content">
                                <div class="col-md-2">
                                    <label>IPK</label>
                                    <h5><?php echo $ipk ?></h5>
                                </div>
                                <div class="col-md-2">
                                    <label>SKS</label>
                                    <h5><?php echo $jumlah_sks ?></h5>
                                </div>
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <h5><?php echo $email ?></h5>
                                </div>
                                <div class="col-md-4">
                                    <label>HP</label>
                                    <h5><?php echo $mobile ?></h5>
                                </div>
                                <div class="profile_left">
                                    <label><h5><i class="fa fa-user"></i> <strong>NAMA LENGKAP</strong></h5></label>
                                    <h5><?php echo $nama ?></h5>
                                    <hr>
                                    <label><h5><strong>NIM</strong></h5></label>
                                    <h5><?php echo $nim ?></h5>
                                    <hr>
                                    <label><h5><strong>KEAHLIAN</strong></h5></label>
                                    <h5><?php echo $skill ?></h5>
                                    <hr>
                                    <label><h5><strong>PENGALAMAN</strong></h5></label>
                                    <h5>
                                        <span><?php echo $pengalaman ?></span>
                                    </h5>
                                    <br>
                                </div>
                            </div>
                            <!-- end detail profile -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="edit" aria-labelledby="profile-tab">
                            <!-- start update profile -->
                            <div class="x_title">
                                <h2>Detail Profil<small></small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <!-- form start update profile -->
<!--                                <form id="demo-form" data-parsley-validate>-->
                                <form role="form" action="<?php echo base_url() ?>mahasiswa/profil/editProfil" method="post" id="editProfil" enctype="multipart/form-data" >
                                    <input type="hidden" class="form-control required" id="id_mahasiswa" name="id_mahasiswa" value="<?php echo $id_mahasiswa ?>" >
                                    <label for="foto">Ubah Foto <small>(Latar Belakang Biru & Maks. ukuran 1 MB)</small></label>
                                    <div class="input-group col-md-6">
                                        <input type="file" class="form-control" name="" id="foto">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" value="<?php echo $email ?>">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="ipk">IPK</label>
                                            <input type="text" id="ipk" class="form-control" name="ipk" value="<?php echo $ipk ?>">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                            <label for="hp">No. HP</label>
                                            <input type="number" id="hp" class="form-control" name="hp" value="<?php echo $mobile ?>">
                                        </div>
                                        <div class="col-md-2" style="margin-bottom: 3%">
                                            <label for="sks">SKS</label>
                                            <input type="number" id="sks" class="form-control" name="sks" value="<?php echo $jumlah_sks ?>">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <label for="fullname">Nama Lengkap</label>
                                    <input type="text" id="fullname" class="form-control" name="fullname" value="<?php echo $nama ?>"><br>
                                    <label for="nim">NIM</label>
                                    <input type="text" id="nim" name="nim" class="form-control" data-parsley-trigger="change" value="<?php echo $nim ?>"/><br>
                                    <label for="skill">Keahlian <small>(pisahkan dengan 'koma')</small></label>
                                    <input class="form-control" id="skill" name="skill" value="<?php echo $skill ?>">
                                    <br/>
                                    <label for="experience">Pengalaman <small>(deskripsikan)</small></label>
                                    <textarea class="form-control" id="experience" name="pengalaman" rows="3"><?php echo $pengalaman ?></textarea>
                                    <br/>
                                    <a href="#profil" class="btn btn-danger" role="tab" id="home-tab" data-toggle="tab" aria-expanded="true">Cancel</a>
                                    <input type="submit" class="btn btn-primary" value="Save">
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
