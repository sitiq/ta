<?php
/**
 * Created by nad.
 * Date: 03/04/2018
 * Time: 11:35
 * Description:
 */
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Syarat &nbsp;
                    <i class="fa fa-angle-right"></i> Penilaian
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
                <a href="adduser.html">
                    <a href="<?php echo base_url() ?>akademik/penilaian/add_form" class="btn btn-success pull-right" style="margin-bottom: 2%">
                        <i class="fa fa-plus"></i>
                        Add New</button>
                    </a>
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap bulk_action" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>Nama Penilaian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        foreach($dataTable as $data) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $data->nama;?>
                                </td>
                                <td>
                                    <?php echo ($data->isDeleted == '0') ?  'Aktif' : 'Tidak Aktif'; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url()?>akademik/penilaian/edit_form/<?php echo $data->id_komponen; ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php if($data->isDeleted == '0'){?>
                                        <a class="btn btn-sm btn-danger" data-id="<?php echo $data->id_komponen; ?>" data-toggle='modal' id="delete_modal" data-target='#offModal'>
                                            <i class="fa fa-times"></i>
                                        </a>
                                    <?php }else{?>
                                        <a class="btn btn-sm btn-success" data-id="<?php echo $data->id_komponen; ?>" data-toggle='modal' id="delete_modal" data-target='#onModal'>
                                            <i class="fa fa-check"></i>
                                        </a>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <!-- Modal off -->
    <div class="modal fade" id="offModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Non Aktif Berkas</h4>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin <strong>menonaktifkan</strong> berkas?</p>
                </div>
                <div class="modal-footer">
                    <form action="<?php echo base_url() . 'akademik/penilaian/off' ?>" method="post">
                        <input type="hidden" name="id_komponen" id="id_komponen" value="">
                        <button type="submit" class="btn btn-danger">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--    Modal on-->
    <div class="modal fade" id="onModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Aktif Berkas</h4>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin <strong>mengaktifkan</strong> berkas?</p>
                </div>
                <div class="modal-footer">
                    <form action="<?php echo base_url() . 'akademik/penilaian/on' ?>" method="post">
                        <input type="hidden" name="id_komponen" id="id_komponen" value="">
                        <button type="submit" class="btn btn-success">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on("click", "#delete_modal", function () {
            var id_komponen = $(this).data('id');
            $(".modal-footer #id_komponen").val(id_komponen);
        });
    </script>
</div>

<!-- /page content -->

