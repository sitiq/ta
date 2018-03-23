<?php
/**
 * Created by nad.
 * Date: 22/03/2018
 * Time: 22:26
 * Description:
 */
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Project Management</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--berkas mahasiswa-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Seluruh Proyek<small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="dosen_setproyek.html" class="btn btn-success pull-right">Add New Project</a>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nama Proyek</th>
                            <th>Penanggung Jawab</th>
                            <th>Instansi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($userRecords))
                            {
                            foreach($userRecords as $record)
                            {
                        ?>
                        <tr>
                            <td><?php echo $nama ?></td>
                            <td><?php echo $nama ?></td>
                            <td><?php echo $instansi ?></td>
                            <td><span class="label label-success"><?php echo $status ?></span></td>
                            <td>
                                <a href="" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                                <?php
                                }
                            }
                        ?>
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