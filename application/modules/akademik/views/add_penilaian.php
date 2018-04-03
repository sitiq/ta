<?php
/**
 * Created by nad.
 * Date: 03/04/2018
 * Time: 11:43
 * Description:
 */
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Penilaian
                <small>Add</small>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
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
                    <br />
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() . 'akademik/penilaian/add'?>"
                          method="post">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" style="margin-left: -5%">Nama Penilaian
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="nama" name="nama" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                                <a href="<?php echo base_url() ?>akademik/penilaian/" class="btn btn-danger" type="button">Cancel</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button class="btn btn-success" name="submit" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
