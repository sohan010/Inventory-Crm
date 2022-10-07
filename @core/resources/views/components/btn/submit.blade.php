<script>
    $(document).on('click','#submit',function () {
        $(this).addClass("disabled")
        $(this).html('<i class="fa fa-spinner fa-spin mr-1"></i> {{__("Submitting..")}}');
    });
</script>