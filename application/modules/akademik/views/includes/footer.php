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
        eLusi - Kelulusan Komsi
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo base_url()?>elusistatic/vendors/jQuery/dist/jquery.min.js"></script>

<!-- <![endif]-->
<script src="<?php echo base_url()?>elusistatic/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url()?>elusistatic/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?php echo base_url()?>elusistatic/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo base_url()?>elusistatic/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery autocomplete -->
<script src="<?php echo base_url()?>elusistatic/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url()?>elusistatic/build/js/custom.min.js"></script>
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

        ////

        myTable.on( 'select', function ( e, dt, type, index ) {
            if ( type === 'row' ) {
                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
            }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
            if ( type === 'row' ) {
                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
            }
        } );




        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header

            $('#dynamic-table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) myTable.row(row).select();
                else  myTable.row(row).deselect();
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
            var row = $(this).closest('tr').get(0);
            if(this.checked) myTable.row(row).deselect();
            else myTable.row(row).select();
        });



        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();
        });



        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
            var $row = $(this).closest('tr');
            if($row.is('.detail-row ')) return;
            if(this.checked) $row.addClass(active_class);
            else $row.removeClass(active_class);
        });
    })

</script>
</body>
</html>

