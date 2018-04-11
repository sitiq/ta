<!-- page content -->
<div role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Dashboard</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <center>
            <p>
                <h3>Periode Semester
                    <span>
                        <strong>
                            <?php echo ucfirst($dataPeriode[0]->semester) . " " . $dataPeriode[0]->tahun_ajaran ?>
                        </strong>
                    </span>
                </h3>
            </p>
            <p>
                <i>
                    <?php echo DateTime::createFromFormat('Y-m-d', date('Y-m-d'))->format('j F Y'); ?>
                </i>
            </p>
        </center>
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <div class="count">
                        <?php echo $countProyek ?>
                    </div>
                    <h3>Judul Proyek</h3>
                    <p>
                        <a href="<?php echo base_url(); ?>akademik/proyek">Cek List Judul Proyek
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="count">
                        <?php echo $countSidang ?>
                    </div>
                    <h3>Sidang</h3>
                    <p>
                        <a href="<?php echo base_url(); ?>akademik/sidang">Cek List Sidang</a>
                        <i class="fa fa-arrow-right"></i>
                    </p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <div class="count">
                        <?php echo $countYudisium ?>
                    </div>
                    <h3>Yudisium</h3>
                    <p>
                        <a href="<?php echo base_url(); ?>akademik/yudisium">Cek List Yudisium</a>
                        <i class="fa fa-arrow-right"></i>
                    </p>
                </div>
            </div>
            <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <!--start of chart-->
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <strong>PENILAIAN MAHASISWA (RATA-RATA)</strong>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel tile fixed_height_320">
                                <div class="x_title">
                                    <h3><strong>Tata Bahasa</strong></h3>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <h4>Rata - rata nilai per 4 periode</h4>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>2018/2019 Ganjil</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                                    <span class="sr-only">100% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>3.8</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.3</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>53k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.4</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>23k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.5</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>3k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.6</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>1k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel tile fixed_height_320">
                                <div class="x_title">
                                    <h2>App Versions</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <h4>App Usage across versions</h4>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.2</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>123k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.3</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>53k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.4</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>23k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.5</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>3k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.6</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>1k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="x_content">
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                    
                                <input type="text" id="range_26" value="" name="range" />
                            </div> -->
                            <center>
                                <div class="row">
                                    <div class="well col-md-2" style="margin-left: 6%">
                                        Tata Tulis
                                        <h2>
                                            <strong>3,45</strong>
                                        </h2>
                                    </div>
                                    <div class="well col-md-2" style="margin-left: 1%">
                                        Bahasa
                                        <h2>
                                            <strong>3,45</strong>
                                        </h2>
                                    </div>
                                    <div class="well col-md-2" style="margin-left: 1%">
                                        Kesesuaian Naskah
                                        <h2>
                                            <strong>3,45</strong>
                                        </h2>
                                    </div>
                                    <div class="well col-md-2" style="margin-left: 1%">
                                        Rancangan Masalah
                                        <h2>
                                            <strong>3,45</strong>
                                        </h2>
                                    </div>
                                    <div class="well col-md-2" style="margin-left: 1%">
                                        Tujuan
                                        <h2>
                                            <strong>3,45</strong>
                                        </h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="well col-md-2" style="margin-left: 6%">
                                        Inovasi
                                        <h2>
                                            <strong>3,45</strong>
                                        </h2>
                                    </div>
                                    <div class="well col-md-2" style="margin-left: 1%">
                                        Penguasaan Metode
                                        <h2>
                                            <strong>3,45</strong>
                                        </h2>
                                    </div>
                                    <div class="well col-md-2" style="margin-left: 1%">
                                        Penguasaan Analisis
                                        <h2>
                                            <strong>3,45</strong>
                                        </h2>
                                    </div>
                                    <div class="well col-md-2" style="margin-left: 1%">
                                        Presentasi
                                        <h2>
                                            <strong>3,45</strong>
                                        </h2>
                                    </div>
                                    <div class="well col-md-2" style="margin-left: 1%">
                                        Kesimpulan
                                        <h2>
                                            <strong>3,45</strong>
                                        </h2>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                    <!--end of chart-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<script>
</script>