<script>

    function checkbox_action_click_check(ids)
    {
        if(ids == ''){
            toastr.error('Please seelct a row..!');
        }
    }

    $(document).on('click','#bulk_delete_btn',function (e) {
        e.preventDefault();

        var bulkOption = $('#bulk_option').val();
        var allCheckbox =  $('.bulk-checkbox:checked');
        var allIds = [];
        allCheckbox.each(function(index,value){
            allIds.push($(this).val());
        });

        checkbox_action_click_check(allIds);

        if(allIds != '' && bulkOption == 'delete'){
            $(this).html('<i class="fa fa-spinner fa-spin mr-1"></i><?php echo e(__("Deleting")); ?>');
            $.ajax({
                'type' : "POST",
                'url' : "<?php echo e($url); ?>",
                'data' : {
                    _token: "<?php echo e(csrf_token()); ?>",
                    ids: allIds
                },
                success:function (data) {

                    if(data.status == 'ok'){
                        $('#example23').load(location.href + ' #example23');

                        $('.fa-spinner').remove();
                        $('#bulk_delete_btn').text('Apply');

                        $('.alert').addClass('alert-danger');
                        $('.alert-danger').text('Item Deleted Successfully..! ');
                        setTimeout(function(){
                        $('.alert-danger').hide();
                        },3000);

                    }
                   // location.reload();
                }
            });
        }
    });
    $('.all-checkbox').on('change',function (e) {
        e.preventDefault();
        var value = $('.all-checkbox').is(':checked');
        var allChek = $(this).parent().parent().parent().parent().parent().find('.bulk-checkbox');
        if( value == true){
            allChek.prop('checked',true);
        }else{
            allChek.prop('checked',false);
        }
    });
</script><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/bulk-action-js.blade.php ENDPATH**/ ?>