
<form id="myform" action="" method="POST" role="form">

<div class="form-group">
    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nama_proyek">Nama Proyek
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" class="kita form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nama_proyek">Nama Proyek
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" class="kita form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="submit" class="btn btn-primary col-md-7 col-xs-12">
    </div>
</div>

</form>

<script>
$.validator.addClassRules("kita", {
    crequired: true
});
$('#myform').validate();
$.validator.addMethod("crequired", $.validator.methods.required,"Masukkan value");
</script>