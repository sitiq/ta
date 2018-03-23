<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 07:28
 * Description:
 */
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Pendaftaran Sidang</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Penting !<br><small>
                            <ul>
                                <li>Diwajibkan untuk membaca tata cara pada berkas bagian akademik.</li>
                                <li>Format nama file : NIF - label . Contoh : 09457 - usulan sidang</li>
                            </ul>
                            <h5 class="badge bg-red">Pastikan Data Diri Terbaru pada Profil Anda</h5>
                        </small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!--start pane upload-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content">
                            <!--Pane usulan sidang-->
                            <div role="tabpanel" class="tab-pane fade in" id="tab_content1" aria-labelledby="usulan">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Usulan Sidang<small><i> Ditandatangan oleh Dosen Pembimbing</i></small></h4>
                                        </strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="usulan" hidden>
                                                <input type="file" name="path" class="form-control">
                                            </form>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--pane krs semester-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="krs">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas KRS Semester Terakhir<small><i> Ditandatangan oleh Dosen Pembimbing Akademik</i></small></h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="krs-terakhir" hidden>
                                                <input type="file" name="path" class="form-control">
                                            </form>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--pane rekap-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="krs">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Rekap Nilai <small><i> Dari PALAWA</i></small></h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="rekap-nilai" hidden>
                                                <input type="file" name="path" class="form-control">
                                            </form>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--pane khs-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="khs">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas KHS (Kartu Hasil Studi)<small><i> Semester Awal hingga Akhir</i></small></h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="khs" hidden>
                                                <input type="file" name="path" class="form-control">
                                            </form>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--pane kb-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="kb">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Kartu Bimbingan<small><i> Min. 6 pertemuan</i></small></h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="kartu-bimbingan" hidden>
                                                <input type="file" name="path" class="form-control">
                                            </form>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--pane ktm-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="ktm">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas KTM (Kartu Tanda Mahasiswa)</h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="ktm" hidden>
                                                <input type="file" name="path" class="form-control">
                                            </form>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--pane riwayat-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="riwayat">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Riwayat Registrasi <small><i> Dari PALAWA</i></small></h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="riwayat" hidden>
                                                <input type="file" name="path" class="form-control">
                                            </form>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--pane TA-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="ta">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Tugas Akhir</h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="tugas-akhir" hidden>
                                                <input type="file" name="path" class="form-control">
                                            </form>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--pane cover-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content9" aria-labelledby="cover">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Cover Laporan TA <small> <i> Ditandatangan oleh Dosen Pembimbing</i></small></h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="cover" hidden>
                                                <input type="file" name="path" class="form-control">
                                            </form>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end pane upload-->
                    <table class="table table-bordered">
                        <thead>
                        <tr bgcolor="#67CEA6" style="color: white">
                            <th colspan="4"><h4><strong>Data Berkas Sidang</strong></h4></th>
                        </tr>
                        <tr bgcolor="#59BD96" style="color: white">
                            <th>Aksi</th>
                            <th>No</th>
                            <th>Berkas</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <a href="#tab_content1" id="usulan" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                            <td>1</td>
                            <td>Usulan Sidang</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content2" role="tab" id="krs" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>2</td>
                            <td>KRS Semester Terakhir <small><i>[ACC DPA]</i></small></td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content3" role="tab" id="rekap" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>3</td>
                            <td>Rekap Nilai</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content4" role="tab" id="khs" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>4</td>
                            <td>KHS <small><i>[Semester awal hingga akhir]</i></small></td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content5" role="tab" id="kb" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>5</td>
                            <td>Kartu Bimbingan <small><i>[Min. 6 pertemuan]</i></small></td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content6" role="tab" id="ktm" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>6</td>
                            <td>KTM</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content7" role="tab" id="riwayat" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>7</td>
                            <td>Riwayat Registrasi</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content8" role="tab" id="proposal" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>8</td>
                            <td>Proposal Tugas Akhir</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content9" role="tab" id="ta" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>9</td>
                            <td>Laporan Tugas Akhir</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content9" role="tab" id="cover" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>10</td>
                            <td>Cover Laporan TA <small><i>[ACC dosen pembimbing]</i></small></td>
                            <td>Pending</td>
                        </tr>
                        </tbody>
                    </table>
                    <!--end upload berkas-->
                </div>
                <!--<div class="ln_solid"></div>-->
            </div>
        </div>
    </div>
</div>
