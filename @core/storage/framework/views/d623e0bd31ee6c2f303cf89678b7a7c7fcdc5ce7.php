<!-- Start datatable js -->
<script src="<?php echo e(asset('assets/backend/xgenious/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/xgenious/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/xgenious/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/xgenious/js/dataTables.responsive.min.js')); ?>"></script>

<?php if(!isset($onlyjs)): ?>
<script>
     (function($){
        "use strict";

        $(document).ready(function() {
            $('.table-wrap > table').DataTable( {
                "order": [[ 1, "desc" ]],
                'columnDefs' : [{
                    'targets' : 'no-sort',
                    "orderable" : false
                }]
            } );
        } );

    })(jQuery)
</script>
<?php endif; ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/datatable/js.blade.php ENDPATH**/ ?>