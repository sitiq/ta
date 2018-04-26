<?php
$array_usulan = [];

?>

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
            <?php //var_dump($dataProyek)?>
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
                                <form action="<?php echo base_url(); ?>akademik/tugas_akhir/plotting_ta" method="post" onSubmit="return confirm('Apakah anda yakin dengan pilihan anda? (Aksi yang sudah dilakukan tidak bisa dikembalikan lagi)');">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <p>
                                            <span class="badge">Pengajuan Tugas Akhir</span>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Pilihan</th>
                                                        <th>Judul</th>
                                                        <th>Dosen Pembimbing</th>
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
                                                            
                                                            <?php if($data['jenis'] == 'usul') { 
                                                                $array_usulan = [
                                                                    'judul' => $data['judul'],
                                                                    'deskripsi' => $data['deskripsi'],
                                                                    'bisnis_rule' => $data['bisnis_rule'],
                                                                    'file' => $data['file']
                                                                ];
                                                            ?>
                                                            
                                                            <td>
                                                                <input type="radio" class="flat" name="terima" id="terima_usulan" value="<?php echo $data['id_pengajuan_ta'] . ' ' .'usulan'?>"
                                                                />
                                                            </td>
                                                            <?php } else { ?>
                                                            <td>
                                                                <input type="radio" class="flat" name="terima" id="terima_proyek" value="<?php echo $data['id_pengajuan_ta'] . ' ' . $data['id_proyek'] ?>"
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
                                                                <input type="radio" class="flat" name="terima" id="terima_dipilihkan" value="manual" />
                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Tampilan pilih usulan -->
                                    <div style="display:none" id="usulan" class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <span class="badge">Usulan Judul</span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p>
                                                <?php echo $array_usulan['judul']; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <span class="badge">Deskripsi Proyek</span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p>
                                                <?php echo $array_usulan['deskripsi']; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <span class="badge">Business Rule</span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p>
                                                <?php echo $array_usulan['bisnis_rule']; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <span class="badge">Persetujuan Institusi</span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p>
                                                <?php echo $array_usulan['file']; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            Tentukan dosen pembimbing
                                            <select name="dosen" id="dosen" class="form-control">
                                                <option value="">Pilih Dosen pembimbing..</option>
                                                <?php foreach ($dataDosen as $data) { ?>
                                                <option value="<?php echo $data->id_dosen?>">
                                                    <?php echo $data->nama; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Tampilan dipilihkan -->
                                    <div style="display:none" id="dipilihkan" class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-6">
                                            Tentukan Proyek
                                            <select name="proyek" id="proyek" class="form-control">
                                                <option value="">Pilih Proyek..</option>
                                                <?php if($dataProyek) { foreach ($dataProyek as $data) { ?>
                                                <option value="<?php echo $data->id_proyek?>">
                                                    <?php echo $data->nama_proyek; ?>
                                                </option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_ta" value="<?php echo $dataTA[0]->id_ta; ?>">
                                    <input type="hidden" name="id_mahasiswa" value="<?php echo $dataTA[0]->id_mahasiswa; ?>">
                                    <?php if(!$isMasaRegis) { ?>
                                        <input class="btn btn-success pull-right" type="submit">
                                        <a href="<?php echo base_url() ?>akademik/tugas_akhir" class="btn btn-danger pull-right">Cancel</a>
                                    <?php } else { ?>
                                        <center><h4><i>(Periode registrasi tugas akhir masih berlangsung, plotting tugas akhir belum bisa dilakukan)</i></h4></center>
                                    <?php }?>
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
<script>
    // $('input').iCheck('check', function(){
    //   alert('Well done, Sir');
    // });
    $('input#terima_usulan').on('ifChecked', function (event) {
        $("#usulan").show();
        $("#dipilihkan").hide();
    });
    $('input#terima_proyek').on('ifChecked', function (event) {
        $("#usulan").hide();
        $("#dipilihkan").hide();
    });
    $('input#terima_dipilihkan').on('ifChecked', function (event) {
        $("#usulan").hide();
        $("#dipilihkan").show();
    });
</script>