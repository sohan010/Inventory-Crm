<script>
    $(document).on('click','#submit',function () {
        $(this).addClass("disabled")
        $(this).html('<i class="fa fa-spinner fa-spin mr-1"></i> <?php echo e(__("Submitting..")); ?>');
    });
</script><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/btn/submit.blade.php ENDPATH**/ ?>