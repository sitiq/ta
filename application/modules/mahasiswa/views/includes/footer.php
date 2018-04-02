<?php
/**
 * Created by nad.
 * Date: 07/03/2018
 * Time: 11:32
 * Description:
 */
?>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>
    <div class="pull-right">
        KOMSI - Tugas Akhir
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url()?>elusistatic/js/jquery.validate.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url()?>elusistatic/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/moment/min/moment.min.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?php echo base_url()?>elusistatic/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery autocomplete -->
<script src="<?php echo base_url()?>elusistatic/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url()?>elusistatic/build/js/custom.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url()?>elusistatic/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!--<script src="--><?php //echo base_url()?><!--elusistatic/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--elusistatic/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--elusistatic/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>-->
<script src="<?php echo base_url()?>elusistatic/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/pdfmake/build/vfs_fonts.js"></script>

<script src="<?php echo base_url(); ?>elusistatic/assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>elusistatic/assets/js/validation.js" type="text/javascript"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
                .DataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                        { "bSortable": false },
                        null, null,null, null, null,
                        { "bSortable": false }
                    ],
                    "aaSorting": [],

                    select: {
                        style: 'multi'
                    }
                } );
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){

        jQuery.validator.addMethod("notEqualToGroup", function(value, element, options) {
            // get all the elements passed here with the same class
            var elems = $(element).parents('form').find(options[0]);
            // the value of the current element
            var valueToCompare = value;
            // count
            var matchesFound = 0;
            // loop each element and compare its value with the current value
            // and increase the count every time we find one
            jQuery.each(elems, function(){
                thisVal = $(this).val();
                if(thisVal == valueToCompare){
                    matchesFound++;
                }
            });
            // count should be either 0 or 1 max
            if(this.optional(element) || matchesFound <= 1) {
                //elems.removeClass('error');
                return true;
            } else {
                //elems.addClass('error');
            }
        }, jQuery.validator.format("Please enter a Unique Value."))


        $("#lele").validate({
            rules: {
                satu: {
                    required: true,
                    notEqualToGroup: ['.distinctemails']
                },
                dua: {
                    required: true,
                    notEqualToGroup: ['.distinctemails']
                },
                tiga: {
                    required: true,
                    notEqualToGroup: ['.distinctemails']
                },
            },
        });
    });

</script>
</body>
</html>

