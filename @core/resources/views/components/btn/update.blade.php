<script>
    $(document).on('click','#update',function () {
        $(this).addClass("disabled")
        $(this).html('<i class="fa fa-spinner fa-spin mr-1"></i> {{__("Updating..")}}');
    });
</script>