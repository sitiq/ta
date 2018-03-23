<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 07:31
 * Description:
 */
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
                        <h3>Imam Fahrurrozi., M.Cs</h3>

                        <ul class="list-unstyled user_data">
                            <li class="m-top-xs">
                                <strong>NIP : </strong>
                                09123012391
                            </li>
                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i> Dosen
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
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start detail profile-->
                            <div class="x_title">
                                <h3>Detail Profil</h3>
                            </div>
                            <div class="x_content">
                                <div class="profile_left">
                                    <label><h4><i class="fa fa-user"></i> <strong>Nama Lengkap</strong></h4></label>
                                    <h4>Imam Fahrurrozi., M.Cs</h4>
                                    <hr>
                                    <label><h4><strong>NIP / NIDN</strong></h4></label>
                                    <h4>09123012391</h4>
                                    <hr>
                                    <label><h4><strong>KEAHLIAN</strong></h4></label>
                                    <h4>
                                        <ul>
                                            <li>Java</li>
                                            <li>C++</li>
                                        </ul>
                                    </h4>
                                    <br>
                                    <a href="#tab_content2" class="btn btn-primary" role="tab" id="profile-edit" data-toggle="tab" aria-expanded="false">Update Profile</a>
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
                                <form id="demo-form" data-parsley-validate>
                                    <label for="foto">Ubah Foto <small>(Maks. ukuran 1 MB)</small></label>
                                    <div class="input-group col-md-6">
                                        <input type="file" class="form-control" id="foto">
                                        <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary">Change</button>
                                                    </span>
                                    </div>
                                    <label for="fullname">Nama Lengkap</label>
                                    <input type="text" id="fullname" class="form-control" name="fullname"/><br>
                                    <label for="nid">NIP / NIDN</label>
                                    <input type="text" id="nid" name="nid" class="form-control" data-parsley-trigger="change"/><br>
                                    <label for="skill">Keahlian <small>(pisahkan dengan 'koma')</small></label>
                                    <textarea class="form-control" id="skill" name="skill" id=""rows="3"></textarea>
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
