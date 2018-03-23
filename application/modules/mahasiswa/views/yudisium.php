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
            <h3>Pendaftaran Yudisium</h3>
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
                        </small>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!--start pane upload-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content">
                            <!--Pane mohon-->
                            <div role="tabpanel" class="tab-pane fade in" id="tab_content1" aria-labelledby="mohon">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Permohonan Yudisium</h4>
                                        </strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="mohon-yudisium" hidden>
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
                            <!--pane acara-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="acara">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Berita Acara</h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="berita" hidden>
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
                            <!--pane sttm-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="sttm">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Surat Tanda Terima Menyerahkan Tugas Akhir & Bebas Perpustakaan UGM</h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="sttm" hidden>
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
                            <!--pane poster-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="poster">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Poster Tugas Akhir <small><i>Ukuran A3</i></small></h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="poster" hidden>
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
                            <!--pane lap-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="lap">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Laporan Tugas Akhir<small><i> Yang telah direvisi FINAL</i></small></h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="tugasakhir-fix" hidden>
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
                            <!--pane ijazah-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="ijazah">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Berkas Ijazah SMA/K Terakhir</h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="ijazah" hidden>
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
                            <!--pane sertif-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="sertif">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <strong><h4>Sertifikat Kemampuan Bahasa Inggris <small><i> Sesuai ketentuan berlaku</i></small></h4></strong>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><strong>Unggah[*pdf]</strong> <br> Maksimal 2mb</th>
                                        <th>
                                            <form>
                                                <input type="number" name="id" hidden>
                                                <input type="text" name="berkas" value="sertif" hidden>
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
                                <a href="#tab_content1" id="mohon" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                            <td>1</td>
                            <td>Permohonan Yudisium</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content2" role="tab" id="acara" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>2</td>
                            <td>Berita Acara</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content3" role="tab" id="sttm" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>3</td>
                            <td>Surat Tanda Terima Menyerahkan Tugas Akhir & Bebas Perpustakaan UGM</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content4" role="tab" id="poster" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>4</td>
                            <td>Poster Hasil Tugas Akhir <small><i>[ukuran A3]</i></small></td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content5" role="tab" id="lap" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>5</td>
                            <td>Laporan Tugas Akhir <small><i>[telah direvisi FINAL]</i></small></td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content6" role="tab" id="ijazah" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>6</td>
                            <td>Ijazah SMA/K Terakhir</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#tab_content7" role="tab" id="sertif" data-toggle="tab" aria-expanded="false" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>7</td>
                            <td>Sertifikat Kemampuan Bahasa Inggris <small>[sesuai ketentuan berlaku]</small></td>
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
