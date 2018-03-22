<?php
/**
 * Created by nad.
 * Date: 22/03/2018
 * Time: 12:48
 * Description:
 */
var_dump($proyekInfo);
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Pendaftaran Tugas Akhir</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h5 class="badge bg-red">Pastikan Data Diri Terbaru pada Profil Anda</h5>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="daftar" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <input class="" id="" type="number" min="1" max="3">
                                <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control">
                                    <option>Pilih ..</option>
                                    <option>Sistem Informasi Cuti Frontend</option>
                                    <option>Sistem Informasi Cuti Backend</option>
                                </select>
                            </div>
                            <div class="clearfix" style="margin-bottom: 2%"></div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <input class="" id="" type="number" max="3" min="1"> <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control">
                                    <option>Pilih ..</option>
                                    <option>Sistem Informasi Cuti Frontend</option>
                                    <option>Sistem Informasi Cuti Backend</option>
                                </select>
                            </div>
                            <div class="clearfix" style="margin-bottom: 2%"></div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan <input class="" id="" type="number" max="3" min="1"> <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="btn-group" data-toggle="buttons" id="pilihan3">
                                    <label class="btn btn-default">
                                        <a href="#tab_content3" role="tab" id="ide" data-toggle="tab" aria-expanded="true">
                                            <input type="radio" name="options" id="option3"> Usul Ide
                                        </a>
                                    </label>
                                    <label class="btn btn-default">
                                        <a href="#tab_content4" role="tab" id="proyek" data-toggle="tab" aria-expanded="true">
                                            <input type="radio" name="options" id="option4"> Project
                                        </a>
                                    </label>
                                </div>
                            </div>
                            <div class="clearfix" style="margin-bottom: 2%"></div>
                            <!--pane 2-->
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <div id="myTabContent" class="tab-content">
                                    <!--pane ide-->
                                    <div role="tabpanel" class="tab-pane fade in" id="tab_content3" aria-labelledby="home-tab">
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
                                                    <input type="text" class="form-control col-md-7 col-xs-12" placeholder="jawaban anda">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Project <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea type="text" class="form-control col-md-7 col-xs-12" placeholder="Deskripsikan dengan singkat dan jelas"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Business Rule <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea type="text" class="form-control col-md-7 col-xs-12" placeholder="Bisnis yang diusulkan meliputi alur proses yang ada, data dan pengguna yang terlibat di dalamnya"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Persetujuan Institusi
                                                </label><small>Bagi yang mengajukan project dari institusi (jika ada)</small>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-9">
                                                <button class="btn btn-success pull-right">Submit</button>
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
                                                    <select class="form-control">
                                                        <option>Pilih ..</option>
                                                        <option>Sistem Informasi Cuti Frontend</option>
                                                        <option>Sistem Informasi Cuti Backend</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-success pull-right" style="margin-top: 3%">Submit</button>
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
            <div class="x_panel">
                <div class="x_title">
                    <h3><strong>STATUS : AKTIF</strong></h3>
                    <div class="clearfix"></div>
                </div>
                <button class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-warning pull-right"><i class="fa fa-edit"></i> Ganti Judul</button>
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan 1</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" value="Sistem Informasi Cuti Frontend" readonly>
                        </div>
                        <div class="clearfix" style="margin-bottom: 2%"></div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan 2</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" value="Sistem Informasi Cuti Frontend" readonly>
                        </div>
                        <!--Pilihan 3 proyek-->
                        <div class="clearfix" style="margin-bottom: 2%"></div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan 3</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" value="Sistem Informasi Cuti Frontend">
                        </div>
                        <!--Pilihan 3 usul ide-->
                        <div class="clearfix" style="margin-bottom: 2%"></div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilihan 3</label>
                        <div class="clearfix" style="margin-bottom: 2%"></div>
                        <!--usulan-->
                        <div class="well col-md-8">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Usulan Judul</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <span>Sistem Informasi Cuti Frontend</span>
                            </div>
                            <div class="clearfix" style="margin-bottom: 2%"></div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Project</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            <span>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A beatae commodi, consectetur corporis earum eos exercitationem facilis fuga iste quo reprehenderit repudiandae sit! Cupiditate facere magni minus nam quas, velit.
                                            </span>
                            </div>
                            <div class="clearfix" style="margin-bottom: 2%"></div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Business Rule</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            <span>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, magni, odit! Ab fuga hic illum laboriosam reprehenderit! Ad distinctio expedita illum magni maxime mollitia officia quidem sapiente, sequi, soluta, temporibus.
                                            </span>
                            </div>
                            <div class="clearfix" style="margin-bottom: 2%"></div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Persetujuan Instansi</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="">persetujuan.pdf</a>
                            </div>
                            <div class="clearfix" style="margin-bottom: 2%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
