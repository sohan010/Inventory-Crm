<script>
    $(document).on('click','#update',function () {
        $(this).addClass("disabled")
        $(this).html('<i class="fa fa-spinner fa-spin mr-1"></i> <?php echo e(__("Updating..")); ?>');
    });
</script><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/btn/update.blade.php ENDPATH**/ ?>