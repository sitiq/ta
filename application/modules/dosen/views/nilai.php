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
            <h3><a href="dosen_daftaruji.html"><i class="fa fa-chevron-left"></i></a> &nbsp;Sidang Pendadaran</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--berkas mahasiswa-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Penilaian</h2>
                    <div class="clearfix" style="margin-top: -5%"></div>
                    <div class="well">
                        <ul>
                            <li>Simpan Laporan Tugas Akhir(.pdf) yang telah diberi pesan revisi, lalu unggah</li>
                        </ul>
                    </div>
                </div>
                <div class="x_content">
                    <p class="col-md-12 product_price"><strong>Penilaian : </strong>
                        <span class="badge bg-red">1</span> Kurang
                        <span class="badge bg-orange">2</span> Cukup
                        <span class="badge bg-green">3</span> Baik
                        <span class="badge bg-blue">4</span> Sangat Baik
                    </p>
                    <div class="col-md-6">
                        <!--table nilai-->
                        <table class="table table-bordered">
                            <thead>
                            <tr bgcolor="#67CEA6" style="color: white">
                                <th colspan="4"><h4><strong>Data Penilaian</strong></h4></th>
                            </tr>
                            <tr bgcolor="#59BD96" style="color: white">
                                <th>No</th>
                                <th>Subject</th>
                                <th>Nilai</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <th>Tata Tulis</th>
                                <td>
                                    1<input type="radio" class="flat" name="tata" id="t1" value="1" />
                                    2<input type="radio" class="flat" name="tata" id="t2" value="2" />
                                    3<input type="radio" class="flat" name="tata" id="t3" value="3" />
                                    4<input type="radio" class="flat" name="tata" id="t4" value="4" required />
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <th>Bahasa</th>
                                <td>
                                    1<input type="radio" class="flat" name="bahasa" id="b1" value="1" />
                                    2<input type="radio" class="flat" name="bahasa" id="b2" value="2" />
                                    3<input type="radio" class="flat" name="bahasa" id="b3" value="3" />
                                    4<input type="radio" class="flat" name="bahasa" id="b4" value="4" required />
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <th>Kesesuaian Naskah dengan Rancangan</th>
                                <td>
                                    1<input type="radio" class="flat" name="naskah" id="n1" value="1" />
                                    2<input type="radio" class="flat" name="naskah" id="n2" value="2" />
                                    3<input type="radio" class="flat" name="naskah" id="n3" value="3" />
                                    4<input type="radio" class="flat" name="naskah" id="n4" value="4" required />
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <th>Rancangan Masalah</th>
                                <td>
                                    1<input type="radio" class="flat" name="rancang" id="r1" value="1" />
                                    2<input type="radio" class="flat" name="rancang" id="r2" value="2" />
                                    3<input type="radio" class="flat" name="rancang" id="r3" value="3" />
                                    4<input type="radio" class="flat" name="rancang" id="r4" value="4" required />
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <th>Tujuan</th>
                                <td>
                                    1<input type="radio" class="flat" name="tujuan" id="j1" value="1" />
                                    2<input type="radio" class="flat" name="tujuan" id="j2" value="2" />
                                    3<input type="radio" class="flat" name="tujuan" id="j3" value="3" />
                                    4<input type="radio" class="flat" name="tujuan" id="j4" value="4" required />
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <th>Inovasi</th>
                                <td>
                                    1<input type="radio" class="flat" name="inovasi" id="i1" value="1" />
                                    2<input type="radio" class="flat" name="inovasi" id="i2" value="2" />
                                    3<input type="radio" class="flat" name="inovasi" id="i3" value="3" />
                                    4<input type="radio" class="flat" name="inovasi" id="i4" value="4" required />
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <th>Penguasaan Metode</th>
                                <td>
                                    1<input type="radio" class="flat" name="metode" id="m1" value="1" />
                                    2<input type="radio" class="flat" name="metode" id="m2" value="2" />
                                    3<input type="radio" class="flat" name="metode" id="m3" value="3" />
                                    4<input type="radio" class="flat" name="metode" id="m4" value="4" required />
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <th>Penguasaan Analisis</th>
                                <td>
                                    1<input type="radio" class="flat" name="analisis" id="a1" value="1" />
                                    2<input type="radio" class="flat" name="analisis" id="a2" value="2" />
                                    3<input type="radio" class="flat" name="analisis" id="a3" value="3" />
                                    4<input type="radio" class="flat" name="analisis" id="a4" value="4" required />
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <th>Presentasi</th>
                                <td>
                                    1<input type="radio" class="flat" name="presentasi" id="p1" value="1" />
                                    2<input type="radio" class="flat" name="presentasi" id="p2" value="2" />
                                    3<input type="radio" class="flat" name="presentasi" id="p3" value="3" />
                                    4<input type="radio" class="flat" name="presentasi" id="p4" value="4" required />
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <th>Kesimpulan</th>
                                <td>
                                    1<input type="radio" class="flat" name="kesimpulan" id="k1" value="1" />
                                    2<input type="radio" class="flat" name="kesimpulan" id="k2" value="2" />
                                    3<input type="radio" class="flat" name="kesimpulan" id="k3" value="3" />
                                    4<input type="radio" class="flat" name="kesimpulan" id="k4" value="4" required />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <span><h4><strong>Total : </strong>3,78</h4></span>
                                    <button class="btn btn-warning pull-right">Submit</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!--end table nilai-->
                    </div>
                    <div class="col-md-6">
                        <!--table nilai-->
                        <table class="table table-bordered">
                            <thead>
                            <tr bgcolor="#59BD96" style="color: white">
                                <th colspan="4"><h4><strong>Unggah Revisi Laporan</strong></h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="3">
                                    <input type="number" name="id" hidden>
                                    <input type="text" name="revisi" hidden>
                                    <input type="file" class="form-control" name="path">
                                    <button class="btn btn-warning pull-right" style="margin-top: 3%">Submit</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!--end table nilai-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
