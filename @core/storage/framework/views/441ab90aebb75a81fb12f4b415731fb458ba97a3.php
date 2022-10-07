<div class="col-lg-<?php echo e($col ?? '12'); ?> mt-3">
    <label for=""><?php echo e($label ?? 'Image'); ?></label>
    <div class="media-upload-btn-wrapper">
        <div class="img-wrap">
            <?php
                $image = get_attachment_image_by_id($value ?? '',null,true);
                $image_btn_label = __('Upload Image');
            ?>
            <?php if(!empty($image)): ?>
                <div class="attachment-preview">
                    <div class="thumbnail">
                        <div class="centered">
                            <img class="avatar user-thumb" src="<?php echo e($image['img_url']); ?>" alt="">
                        </div>
                    </div>
                </div>
                <?php  $label =__( 'Change Image'); ?>
            <?php endif; ?>
        </div>
        <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($value ?? ''); ?>">
        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
            <?php echo e(__($label ?? 'Image')); ?>

        </button>
    </div>
</div>
<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/form-fields/form-image.blade.php ENDPATH**/ ?>