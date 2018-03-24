<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Akun Mahasiswa &nbsp;
                    <i class="fa fa-angle-right"></i> User Management
                    <small>Add, Edit, Delete</small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4">
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
                    <a href="<?php echo base_url() ?>akademik/akun_mahasiswa/add_form" class="btn btn-success pull-right" style="margin-bottom: 2%">Add New User</button>
                    </a>
                    <table id="datatable-checkbox" class="table table-striped table-bordered dt-responsive nowrap bulk_action" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=1;
                                foreach($dataTable as $data) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $data->nama; ?>
                                </td>
                                <td>
                                    <?php echo $data->username; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url()?>akademik/akun_mahasiswa/edit_form/<?php echo $data->id_user ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a data-id="<?php echo $data->id_user; ?>" class="btn btn-sm btn-danger" data-toggle='modal' id="delete_modal" data-target='#deleteModal'>
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete User</h4>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus data?</p>
                </div>
                <div class="modal-footer">
                <form action="<?php echo base_url() . 'akademik/user/delete_user' ?>" method="post">                
                    <input type="hidden" name="userId" id="userId" value="">
                    <input type="hidden" name="role" id="role" value="<?php echo $role; ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).on("click", "#delete_modal", function () {
        var id_user = $(this).data('id');
        $(".modal-footer #userId").val(id_user);
    });
    </script>
</div>

<!-- /page content -->