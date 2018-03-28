<div role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Persetujuan Tugas Akhir</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <!-- page content -->
        <div role="main">
            <?php var_dump($dataTA)?>
            <br>
            <br>
            <?php var_dump($dataPengajuanTA)?>
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>
                            <a href="<?php echo base_url() ;?>akademik/tugas_akhir">
                                <i class="fa fa-chevron-left"></i>
                            </a> &nbsp;Pengajuan</h3>
                    </div>
                </div>
                <div class="clearfix"></div>

                <!--berkas mahasiswa-->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Detail Pengajuan
                                </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <p>
                                        <span class="badge">Nama</span>&emsp;
                                        <?php echo $dataTA[0]->nama ?>
                                    </p>
                                    <p>
                                        <span class="badge">NIM</span>&emsp;
                                        <?php echo $dataTA[0]->nim ?>
                                    </p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <p>
                                        <span class="badge">SKS</span>&emsp;
                                        <?php echo $dataTA[0]->jumlah_SKS ?>
                                    </p>
                                    <p>
                                        <span class="badge">IPK</span>&emsp;
                                        <?php echo $dataTA[0]->ipk ?>
                                    </p>
                                    <p>
                                        <span class="badge">TMT</span>&emsp;
                                        <?php echo $dataTA[0]->nim . " " . $dataTA[0]->tahun_ajaran ?>
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <p>
                                            <span class="badge">Pengalaman & Kemampuan</span>
                                        </p>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Pengalaman </th>
                                                    <td>
                                                        <?php echo $dataTA[0]->pengalaman ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Kemampuan </th>
                                                    <td>
                                                        <?php echo $dataTA[0]->skill ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <form action="<?php echo base_url(); ?>akademik/tugas_akhir/plotting_ta" method="post">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <p>
                                            <span class="badge">Pengajuan Tugas Akhir</span>
                                        </p>
                                        <!--alert jika terima proyek berhasil-->
                                        <!-- <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                        Pengajuan diterima !
                                    </div> -->
                                        <!--end alert jika terima proyek berhasil-->
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Pilihan</th>
                                                        <th>Judul</th>
                                                        <th>Dosen Pembimbing</th>
                                                        <th>Detail</th>
                                                        <th>Terima</th>
                                                    </tr>
                                                    <?php
                                                $i=1;
                                                foreach ($dataPengajuanTA as $data) {  ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $i;?>
                                                            </td>
                                                            <td>
                                                                <?php echo ($data['jenis'] == 'proyek'? $data['nama_proyek'] : 'Usulan <i>(detail usulan ada di bawah)</i>');  ?>
                                                            </td>
                                                            <td>
                                                                <?php echo ($data['jenis'] == 'proyek'? $data['nama_dosen'] : '' ); ?>
                                                            </td>
                                                            <?php if($data['jenis'] == 'usul') { ?>
                                                            <td>
                                                                <a class="btn btn-sm btn-default" data-toggle='modal' id="see_modal" data-target=".seeModalUsulan">
                                                                    Lihat
                                                                </a>
                                                            </td>
                                                            <div class="modal fade seeModalUsulan" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">

                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">Lihat Detail Usulan</h4>
                                                                        </div>
                                                                        <div class="modal-body" style="overflow-x: auto;">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <span class="badge">Usulan Judul</span>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <p>
                                                                                        <?php echo $data['judul']; ?>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <span class="badge">Deskripsi Proyek</span>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <p>
                                                                                        <?php echo $data['deskripsi']; ?>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <span class="badge">Business Rule</span>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <p>
                                                                                        <?php echo $data['bisnis_rule']; ?>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <span class="badge">Persetujuan Institusi</span>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <p>
                                                                                        <?php echo $data['file']; ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } else { ?>
                                                            <td>

                                                            </td>
                                                            <?php } ?>

                                                            <td>
                                                                <input type="radio" class="flat" name="terima" id="terima<?php echo $i; ?>" value="<?php echo $data['id_pengajuan_ta']?>"
                                                                />
                                                            </td>
                                                        </tr>

                                                        <?php $i++; } ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo 4;?>
                                                            </td>
                                                            <td>
                                                                <i>(Dipilihkan ke proyek)</i>
                                                            </td>
                                                            <td>
                                                            </td>
                                                            <td>
                                                            </td>
                                                            <td>
                                                                <input type="radio" class="flat" name="terima" id="terima" value="manual" />
                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_ta" value="<?php echo $dataTA[0]->id_ta; ?>">
                                    <input type="hidden" name="id_mahasiswa" value="<?php echo $dataTA[0]->id_mahasiswa; ?>">
                                    <input class="btn btn-success pull-right" type="submit">
                                    <a href="<?php echo base_url() ?>/akademik/tugas_akhir" class="btn btn-danger pull-right">Cancel</a>
                                </form>
                                <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                        <p>
                                            <span class="badge">Usul Ide Judul</span>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Usulan Judul</th>
                                                        <td>Core Aplikasi Online Ticketing Backend</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Deskripsi Project</th>
                                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est magnam
                                                            quae quibusdam ratione sint! A blanditiis consequatur culpa dolor
                                                            dolore dolorum expedita officiis quos sunt voluptatibus? Nobis
                                                            quo suscipit vero.</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Business Rule
                                                            <small> (yang dijalankan)</small>
                                                        </th>
                                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab debitis
                                                            dolores esse expedita facere labore laboriosam magnam nesciunt
                                                            nisi nobis non obcaecati praesentium provident quae, quo recusandae
                                                            suscipit totam voluptas!</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Persetujuan Institusi</th>
                                                        <td>
                                                            <a href="#">persetujuanproyek.pdf</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tentukan dosen</th>
                                                        <td>
                                                            <div class="col-md-6">
                                                                <select name="dosen" class="form-control">
                                                                    <option>Pilih..</option>
                                                                    <option value="1">M Fakhrurrifqi., M.Cs</option>
                                                                    <option value="2">Imam Fahrurrozi., M.Cs</option>
                                                                    <option value="3">Irkham Huda., M.Cs</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button class="btn btn-success">Submit</button>
                                                            </div>
                                                            <div class="col-md-4">
                                                        alert jika terima proyek berhasil
                                                        <div class="alert alert-success alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                            Dosen terpilih !
                                                        </div>
                                                    </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end detail pengajuan panel-->
                <!--start plotting project -->
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in" id="form_dipilihkan" style="display:none" name="form_dipilihkan">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Pilihan Manual
                                            <br>
                                            <small>Pilih project lain, jika 3 pilihan
                                                <strong>Pengajuan Judul</strong> mahasiswa tidak disetujui</small>
                                        </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-2">
                                                Project
                                            </div>
                                            <div class="col-md-5">
                                                <select class="form-control">
                                                    <option>Sistem Informasi Cuti Karyawan</option>
                                                    <option>Sistem Pengembangan Perangkat Lunak</option>
                                                    <option>Aplikasi Pelacak Mobil</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <button class="btn btn-success">Submit</button>
                                            </div>
                                            <!-- <div class="col-md-4 pull-right">
                                        alert jika terima proyek berhasil
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                            Pengajuan manual diterima !
                                        </div>
                                    </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end plotting project-->
                <!--info muncul setelah plotting jika project-->
                <!-- <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>
                                    <strong>PROJECT TERPILIH</strong>
                                </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Pilihan</th>
                                                    <th>Judul</th>
                                                    <th>Dosen Pembimbing</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>C e Aplikasi Online Ticketing Backend</td>
                                                    <td>Endro Purnomo., M.Cs</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>Ubah dosen ?</h4>
                                        <div class="col-md-5">
                                            <select name="dosen" id="" class="form-control">
                                                <option>Pilih..</option>
                                                <option value="1">M Fakhrurrifqi., M.Cs</option>
                                                <option value="2">Imam Fahrurrozi., M.Cs</option>
                                                <option value="3">Irkham Huda., M.Cs</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-success">Submit</button>
                                        </div>
                                        <div class="col-md-4">
                                            alert jika terima proyek berhasil
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                Dosen berhasil diubah !
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--end info muncul setelah plotting jika project-->
                <!--info muncul setelah plotting usul ide-->
                <!-- <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>
                                    <strong>PROJECT TERPILIH</strong>
                                </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Usulan Judul</th>
                                                    <td>Core Aplikasi Online Ticketing Backend</td>
                                                </tr>
                                                <tr>
                                                    <th>Deskripsi Project</th>
                                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est magnam
                                                        quae quibusdam ratione sint! A blanditiis consequatur culpa dolor
                                                        dolore dolorum expedita officiis quos sunt voluptatibus? Nobis quo
                                                        suscipit vero.</td>
                                                </tr>
                                                <tr>
                                                    <th>Business Rule
                                                        <small> (yang dijalankan)</small>
                                                    </th>
                                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab debitis
                                                        dolores esse expedita facere labore laboriosam magnam nesciunt nisi
                                                        nobis non obcaecati praesentium provident quae, quo recusandae suscipit
                                                        totam voluptas!</td>
                                                </tr>
                                                <tr>
                                                    <th>Persetujuan Institusi</th>
                                                    <td>
                                                        <a href="#">persetujuanproyek.pdf</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Dosen Pembimbing</th>
                                                    <td>Irkham Huda.,M.Cs</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h4>Ubah dosen ?</h4>
                                        <div class="col-md-5">
                                            <select name="dosen" id="" class="form-control">
                                                <option>Pilih..</option>
                                                <option value="1">M Fakhrurrifqi., M.Cs</option>
                                                <option value="2">Imam Fahrurrozi., M.Cs</option>
                                                <option value="3">Irkham Huda., M.Cs</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-success">Submit</button>
                                        </div>
                                        <div class="col-md-4">
                                            alert jika terima proyek berhasil
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                Dosen berhasil diubah !
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--end info muncul setelah plotting jika usul ide-->
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>
<script>
    // if($("input:radio[class='flat']").is(":checked")) {
    //     if($(this).val() == "m"){
    //         $("#form_dipilihkan").show();
    //     }else{
    //         $("#form_dipilihkan").hide();
    //         }
    // }

    // $('input[type="radio"]').click(function() {
    //    if($(this).attr('id') == 'tampil_m') {
    //         $('#form_dipilihkan').show();           
    //    } else {
    //         $('#form_dipilihkan').hide();   
    //    }
    // });
    // $(function(){
    //     $(":radio.terima").click(function(){
    //         if($(this).val() == "m"){
    //             $("#form_dipilihkan").show();
    //         }else{
    //             $("#form_dipilihkan").hide();
    //         }
    //     });
    // });
</script>