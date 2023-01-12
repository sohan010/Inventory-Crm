<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"></script>
<script>
    (function($){
    "use strict";
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 150,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            },
            callbacks: {
                onChange: function(contents, $editable) {
                    $(this).prev('input').val(contents);
                }
            }
        });
        if($('.summernote').length > 1){
            $('.summernote').each(function(index,value){
                $(this).summernote('code', $(this).data('content'));
            });
        }
    });

    })(jQuery);
</script><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/summernote/js.blade.php ENDPATH**/ ?>