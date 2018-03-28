<div role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Persetujuan Tugas Akhir</h3>
            </div>
        </div>

        <!-- page content -->
        <div role="main">
            <?php //var_dump($dataTA)?>
            <br>
            <br>
            <?php //var_dump($dataPengajuanTA)?>
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
                            <div class="col-md-12 col-sm-12 col-xs-12">
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
                                                            <?php if($data['jenis'] == 'usul') { ?>
                                                            <td>
                                                                <input type="radio" class="flat" name="terima" id="terima<?php echo $i; ?>" value="<?php echo $data['id_pengajuan_ta'] . ' ' .'usulan'?>"
                                                                />
                                                            </td>
                                                            <?php } else { ?>
                                                            <td>
                                                                <input type="radio" class="flat" name="terima" id="terima<?php echo $i; ?>" value="<?php echo $data['id_pengajuan_ta'] . ' ' . $data['id_proyek'] ?>"
                                                                />
                                                            </td>
                                                            <?php } ?>

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
                            </div>
                        </div>
                        <!-- /page content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>