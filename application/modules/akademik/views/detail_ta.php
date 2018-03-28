<div role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Tugas Akhir</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <!-- page content -->
        <div role="main">
            <?php var_dump($dataMahasiswa)?>
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
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <p>
                        <span class="badge">Nama</span>&emsp;
                        <?php echo $dataMahasiswa[0]->nama ?>
                    </p>
                    <p>
                        <span class="badge">NIM</span>&emsp;
                        <?php echo $dataMahasiswa[0]->nim ?>
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <p>
                        <span class="badge">SKS</span>&emsp;
                        <?php echo $dataMahasiswa[0]->jumlah_SKS ?>
                    </p>
                    <p>
                        <span class="badge">IPK</span>&emsp;
                        <?php echo $dataMahasiswa[0]->ipk ?>
                    </p>
                    <p>
                        <span class="badge">TMT</span>&emsp;
                        <?php echo $dataMahasiswa[0]->nim . " " . $dataMahasiswa[0]->tahun_ajaran ?>
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
                                        <?php echo $dataMahasiswa[0]->pengalaman ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Kemampuan </th>
                                    <td>
                                        <?php echo $dataMahasiswa[0]->skill ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
                                                <td>
                                                    <?php echo $dataPengajuanTA[0]['pilihan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $dataPengajuanTA[0]['nama_proyek']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $dataPengajuanTA[0]['nama_dosen']; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>