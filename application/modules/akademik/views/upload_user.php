<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>User
                <small>Add</small>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php //var_dump($dataThead);?>
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
                    
                    <center>
                        <h4>
                            <strong>Cocokkan nama kolom yang ada di file .xlsx dengan data yang akan dimasukkan</strong>
                        </h4>
                    </center>

                    <center>
                        <h5>
                            
                            <ul>
                                <li>NB: Apabila username berupa NIM lengkap, maka yang akan diambil adalah NIU</li>
                            </ul>
                        </h5>
                    </center>
                    <br />
                    <form class="form-horizontal form-label-left" id="uploadUserForm" action="<?php echo base_url() . 'akademik/user/upload_submit/'?>"
                        method="post">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="fname" id="fname" class="form-control col-md-7 col-xs-12">
                                    <option value="">Pilih Kolom untuk nama...</option>
                                    <?php
                                        foreach ($dataThead as $data) {
                                            foreach ($data as $column => $columnValue) {
                                                if($columnValue != NULL){
                                                    echo "<option value=\"" . $column . "\">" . $columnValue ."</option>";
                                                }
                                            }
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="username" id="username" class="form-control col-md-7 col-xs-12">
                                    <option value="">Pilih Kolom untuk username...</option>
                                    <?php
                                        foreach ($dataThead as $data) {
                                            foreach ($data as $column => $columnValue) {
                                                if($columnValue != NULL){
                                                    echo "<option value=\"" . $column . "\">" . $columnValue ."</option>";
                                                }
                                            }
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <input id="role" type="hidden" name="role" class="form-control col-md-7 col-xs-12" value="<?php echo $role?>">
                        <input id="file_name" type="hidden" name="file_name" class="form-control col-md-7 col-xs-12" value="<?php echo $file_name?>">
                        <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() . 'elusistatic/js/uploadUser.js'?>"></script>