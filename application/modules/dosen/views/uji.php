<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 07:30
 * Description:
 */
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Sidang Pendadaran</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--berkas mahasiswa-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Mahasiswa yang akan Diuji<small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="product_price">
                        <h1 class="price-tax">Silahkan membuka 'Laporan Tugas Akhir' dengan Foxit PhantomPDF</h1>
                    </div>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Tgl Sidang</th>
                            <th>Jam</th>
                            <th>Ruang</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Laporan TA</th>
                            <th>Penilaian</th>
                            <th>Nilai Akhir</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>02-03-2017</td>
                            <td>10:45</td>
                            <td>HY-102</td>
                            <td>14/386071/SV/09457</td>
                            <td>Mail Hamidy</td>
                            <td><button class="btn-sm btn btn-info"><i class="fa fa-download"></i></button></td>
                            <td><a href="dosen_nilaiuji.html" class="btn btn-success btn-sm"><i class="fa fa-tasks"></i></a></td>
                            <td>3.78</td>
                        </tr>
                        </tbody>
                    </table>
                    <!--modal-->
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Pesan Revisi</h4>
                                </div>
                                <div class="modal-body">
                                    <textarea id="" class="col-md-12" rows="5"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button style="margin-top: 2%" type="button" class="btn btn-primary">Kirim</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
